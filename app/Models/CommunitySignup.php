<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunitySignup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'notified',
        'ip_address',
        'user_agent',
        'read_at'
    ];

    protected function casts(): array
    {
        return [
            'read_at' => 'datetime',
            'notified' => 'boolean',
        ];
    }

    /**
     * Get validation rules for community signup.
     * 
     * @param int|null $excludeId ID to exclude from unique check (for updates)
     * @return array
     */
    public static function getValidationRules($excludeId = null)
    {
        // Name must be unique, email and phone can be duplicated
        $nameRule = 'required|string|max:255|unique:community_signups,name';
        
        if ($excludeId) {
            $nameRule .= ',' . $excludeId;
        }
        
        return [
            'name' => $nameRule,
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
        ];
    }
    
    /**
     * Scope a query to only include unread signups.
     */
    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }
}
