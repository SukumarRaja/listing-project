<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\ListingImageGalleryController;
use App\Http\Controllers\Admin\ListingScheduleController;
use App\Http\Controllers\Admin\ListingVideoGalleryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PaymentSettingController;
use App\Http\Controllers\Admin\PendingListingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login')->middleware('guest');
Route::get('/admin/forgot-password', [AdminAuthController::class, 'passwordRequest'])->name('admin.password.request')->middleware('guest');

Route::group(['middleware' => ['auth', 'user.type:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile-password', [ProfileController::class, 'passwordUpdate'])->name('profile-password.update');


    // Hero Routes
    Route::get('/hero', [HeroController::class, 'index'])->name('hero.index');
    Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');

    // Category Routes
    Route::resource('/category', CategoryController::class);

    // Location Routes
    Route::resource('/location', LocationController::class);

    // Amenity Routes
    Route::resource('/amenity', AmenityController::class);

    // Listing Routes
    Route::resource('/listing', ListingController::class);

    // Listing Image Gallery Routes
    Route::resource('/listing-image-gallery', ListingImageGalleryController::class);

    // Listing Video Gallery
    Route::resource('/listing-video-gallery', ListingVideoGalleryController::class);

    // Listing Schedule
    Route::resource('/listing-schedule', ListingScheduleController::class);

    // Package Routes
    Route::resource('/package', PackageController::class);


    // Pending Listing
    Route::get('/pending-listings', [PendingListingController::class, 'index'])->name('pending.listing');

    //Settings Route
    Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/general-settings', [SettingController::class, 'updateGeneralSetting'])->name('general-setting.update');

    // Payement Settings Controller
    Route::get('/payment-settings', [PaymentSettingController::class, 'index'])->name('payment-setting.index');
    Route::post('/paypal-settings', [PaymentSettingController::class, 'paypal'])->name('paypal-setting.update');
});
