<?php

use App\Http\Controllers\Frontend\AgentListingController;
use App\Http\Controllers\Frontend\AgentListingGalleryController;
use App\Http\Controllers\Frontend\AgentListingScheduleController;
use App\Http\Controllers\Frontend\AgentListingVideoController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('listings', [FrontendController::class, 'listings'])->name('listings');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin
Route::group([], base_path("routes/admin.php"));

Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [FrontendProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [FrontendProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile-password', [FrontendProfileController::class, 'updatePassword'])->name('profile-password.update');


    // Listing Routes
    Route::resource('/listing', AgentListingController::class);

    // Listing Image Gallery Route
    Route::resource('/listing-image-gallery', AgentListingGalleryController::class);

    //Listing Video Gallery Route
    Route::resource('/listing-video-gallery', AgentListingVideoController::class);

    //Listing Schedule Route
    Route::resource('/listing-schedule', AgentListingScheduleController::class);
});

require __DIR__ . '/auth.php';
