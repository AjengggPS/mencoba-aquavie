<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InputDataController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MonitoringController;
use App\Http\Controllers\Admin\KolamManagementController;
use App\Http\Controllers\Admin\DeviceManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\IssueManagementController;
use App\Http\Controllers\Admin\FeedbackManagementController;
use App\Http\Controllers\Admin\ShopManagementController;
use App\Http\Controllers\Admin\SettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing & Public Pages
Route::get('/', function () {
    return view('landing.index');
})->name('home');

Route::get('/about', function () {
    return view('landing.about');
})->name('about');

Route::get('/contact', function () {
    return view('landing.contact');
})->name('contact');

Route::get('/learn-more', function () {
    return view('landing.learn-more');
})->name('learn-more');

// Contact Form Submit (Public)
Route::post('/contact/send', function () {
    return back()->with('success', 'Pesan Anda telah terkirim!');
})->name('contact.send');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (Setelah Login - User Regular)
Route::middleware(['web', 'auth'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Input Data
    Route::get('/input-data', [InputDataController::class, 'index'])->name('input-data');
    Route::post('/input-data', [InputDataController::class, 'store'])->name('input-data.store');
    
    // Riwayat & Analisis
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::get('/riwayat/export', [RiwayatController::class, 'export'])->name('riwayat.export');
    
    // Feedback & Support
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::post('/device-issue', [FeedbackController::class, 'storeDeviceIssue'])->name('device-issue.store');
    
    // Shop
    Route::get('/shop', [ShopController::class, 'index'])->name('shop');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Admin Routes (Protected - Hanya untuk Admin)
Route::prefix('admin')->middleware(['web', 'auth', 'admin'])->group(function () {
    
    // Dashboard & Main Pages
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/monitoring', [MonitoringController::class, 'index'])->name('admin.monitoring');
    Route::get('/kolam', [KolamManagementController::class, 'index'])->name('admin.kolam');
    Route::get('/devices', [DeviceManagementController::class, 'index'])->name('admin.devices');
    
    // User Management - menggunakan resource route
    Route::resource('users', UserManagementController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
    
    Route::get('/issues', [IssueManagementController::class, 'index'])->name('admin.issues');
    Route::get('/feedback', [FeedbackManagementController::class, 'index'])->name('admin.feedback');
    Route::get('/shop', [ShopManagementController::class, 'index'])->name('admin.shop');
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
    Route::put('/settings', [SettingsController::class, 'update'])->name('admin.settings.update');
    
    // Product Management Routes
    Route::get('/products/{id}', [ShopManagementController::class, 'show'])->name('admin.products.show');
    Route::get('/products/{id}/edit', [ShopManagementController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ShopManagementController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ShopManagementController::class, 'destroy'])->name('admin.products.destroy');
});