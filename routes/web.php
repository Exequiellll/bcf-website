<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\LiveStreamController;
use App\Http\Controllers\ChurchPersonController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\ScheduleController as AdminScheduleController;
use App\Http\Controllers\Admin\LiveStreamController as AdminLiveStreamController;
use App\Http\Controllers\Admin\InformationPageController;
use App\Http\Controllers\Admin\ChurchPersonController as AdminChurchPersonController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\CommunitySignupController;
use App\Http\Controllers\SitemapController;

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
// Join page route
Route::get('/join', function () {
    return view('join');
})->name('join');

// Registration form route
Route::get('/join-us', function () {
    return view('join-us');
})->name('join-us');
Route::get('/donate', function () {
    return view('donate');
})->name('donate');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/announcements/{id}', [AnnouncementController::class, 'show'])->name('announcements.show');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/church-people', [ChurchPersonController::class, 'index'])->name('church-people.index');
Route::get('/church-people/{id}', [ChurchPersonController::class, 'show'])->name('church-people.show');
Route::get('/live-stream', [LiveStreamController::class, 'index'])->name('live-stream');

// Community Signup
Route::post('/community-signup', [CommunitySignupController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('community-signup.store');

// Admin Authentication Routes - Protected with rate limiting
Route::prefix('admin')->group(function () {
    Route::middleware('throttle:5,1')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    });
    
    Route::post('/logout', [LoginController::class, 'logout'])
        ->middleware('auth')
        ->name('admin.logout');
});

// Admin Protected Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Live Stream
    Route::get('/livestream', [AdminLiveStreamController::class, 'index'])->name('admin.livestream.index');
    Route::post('/livestream', [AdminLiveStreamController::class, 'update'])->name('admin.livestream.update');
    Route::post('/livestream/toggle', [AdminLiveStreamController::class, 'toggleLive'])->name('admin.livestream.toggle');
    
    
    // Announcements
    Route::resource('announcements', AdminAnnouncementController::class)->names([
        'index' => 'admin.announcements.index',
        'create' => 'admin.announcements.create',
        'store' => 'admin.announcements.store',
        'show' => 'admin.announcements.show',
        'edit' => 'admin.announcements.edit',
        'update' => 'admin.announcements.update',
        'destroy' => 'admin.announcements.destroy',
    ]);
    
    // Events
    Route::resource('events', AdminEventController::class)->names([
        'index' => 'admin.events.index',
        'create' => 'admin.events.create',
        'store' => 'admin.events.store',
        'show' => 'admin.events.show',
        'edit' => 'admin.events.edit',
        'update' => 'admin.events.update',
        'destroy' => 'admin.events.destroy',
    ]);
    
    // Schedules
    Route::resource('schedules', AdminScheduleController::class)->names([
        'index' => 'admin.schedules.index',
        'create' => 'admin.schedules.create',
        'store' => 'admin.schedules.store',
        'show' => 'admin.schedules.show',
        'edit' => 'admin.schedules.edit',
        'update' => 'admin.schedules.update',
        'destroy' => 'admin.schedules.destroy',
    ]);
    
    // Information Pages
    Route::resource('information-pages', InformationPageController::class)->names([
        'index' => 'admin.information-pages.index',
        'create' => 'admin.information-pages.create',
        'store' => 'admin.information-pages.store',
        'show' => 'admin.information-pages.show',
        'edit' => 'admin.information-pages.edit',
        'update' => 'admin.information-pages.update',
        'destroy' => 'admin.information-pages.destroy',
    ]);

    // Inbox - Community Signups
    Route::prefix('inbox')->name('admin.inbox.')->group(function () {
        Route::get('/', [InboxController::class, 'index'])->name('index');
        Route::get('/{signup}', [InboxController::class, 'show'])->name('show');
        Route::delete('/{signup}', [InboxController::class, 'destroy'])->name('destroy');
        Route::delete('/', [InboxController::class, 'deleteAll'])->name('deleteAll');
    });
    
    // Church People
    Route::resource('church-people', AdminChurchPersonController::class)->names([
        'index' => 'admin.church-people.index',
        'create' => 'admin.church-people.create',
        'store' => 'admin.church-people.store',
        'show' => 'admin.church-people.show',
        'edit' => 'admin.church-people.edit',
        'update' => 'admin.church-people.update',
        'destroy' => 'admin.church-people.destroy',
    ]);
    
});

Auth::routes(['register' => false]);
