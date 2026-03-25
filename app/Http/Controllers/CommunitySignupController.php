<?php

namespace App\Http\Controllers;

use App\Models\CommunitySignup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewCommunitySignup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class CommunitySignupController extends Controller
{
    /**
     * Show the join us form.
     *
     * @return \Illuminate\View\View
     */
    public function showJoinForm()
    {
        return view('join-us');
    }
    /**
     * Store a newly created resource in storage.
     * 
     * This method handles community signup registration with proper validation,
     * duplicate detection, and admin notification.
     */
    public function store(Request $request)
    {
        Log::info('Community signup request received', [
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'data' => $request->except(['password', 'password_confirmation'])
        ]);

        try {
            // Step 1: Check for rapid duplicate submissions (same name + email/IP within last 5 seconds)
            // This prevents double-submissions from rapid clicks or network retries
            $recentDuplicate = CommunitySignup::where('name', $request->name)
                ->where('ip_address', $request->ip())
                ->where(function($query) use ($request) {
                    if ($request->filled('email')) {
                        $query->where('email', $request->email);
                    } else {
                        $query->whereNull('email');
                    }
                })
                ->where('created_at', '>=', now()->subSeconds(5))
                ->first();
            
            if ($recentDuplicate) {
                Log::warning('Rapid duplicate submission detected and blocked', [
                    'name' => $request->name,
                    'ip' => $request->ip(),
                    'existing_id' => $recentDuplicate->id
                ]);
                
                // Return success to prevent user confusion, but don't save duplicate
                return response()->json([
                    'success' => true,
                    'message' => 'Registration Successful! We\'ll be in touch soon.'
                ], 200);
            }
            
            // Step 2: Validate request data
            $validator = Validator::make($request->all(), CommunitySignup::getValidationRules());

            if ($validator->fails()) {
                $errors = $validator->errors()->toArray();
                Log::warning('Validation failed', ['errors' => $errors]);
                
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'errors' => $errors,
                        'message' => 'Validation failed. Please check your input.'
                    ], 422);
                }

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Step 3: Prepare data for saving (validation passed, no duplicates found)
            $signupData = array_merge(
                $validator->validated(),
                [
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->header('User-Agent'),
                    'notified' => false,
                ]
            );

            // Step 4: Save to database
            Log::info('Creating community signup', ['email' => $signupData['email']]);
            $signup = CommunitySignup::create($signupData);
            
            Log::info('Community signup saved successfully', ['signup_id' => $signup->id]);

            // Step 5: Send notification to admin (non-blocking - don't fail if this fails)
            try {
                $adminEmail = config('mail.admin_email', 'admin@example.com');
                
                if (filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
                    Notification::route('mail', $adminEmail)
                        ->notify(new NewCommunitySignup($signup));
                    
                    $signup->update(['notified' => true]);
                    Log::info('Admin notification sent successfully', ['signup_id' => $signup->id]);
                } else {
                    Log::warning('Invalid admin email configured', ['email' => $adminEmail]);
                }
            } catch (\Exception $e) {
                // Log the error but don't fail the registration
                Log::error('Failed to send admin notification', [
                    'exception' => $e->getMessage(),
                    'signup_id' => $signup->id,
                    'trace' => $e->getTraceAsString()
                ]);
                // Continue - the signup was saved successfully
            }

            // Step 6: Return success response
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Registration Successful! We\'ll be in touch soon.'
                ], 201);
            }

            return redirect()->route('join-us')
                ->with('success', 'Registration Successful! We\'ll be in touch soon.');

        } catch (ValidationException $e) {
            // Laravel validation exception
            Log::warning('Validation exception', ['errors' => $e->errors()]);
            
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
                'message' => 'Validation failed. Please check your input.'
            ], 422);
            
        } catch (\Exception $e) {
            // Catch any other unexpected errors
            Log::error('Unexpected error processing community signup', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->except(['password', 'password_confirmation'])
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again later.'
            ], 500);
        }
    }

}
