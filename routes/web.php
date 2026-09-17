<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// ---------------- Public website ----------------
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{slug}', [PageController::class, 'service'])->name('services.show');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ---------------- Admin auth ----------------
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.store');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// ---------------- Admin panel ----------------
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('services', ServiceController::class)->except(['show']);
    Route::resource('team', TeamController::class)->except(['show']);
    Route::resource('posts', PostController::class)->except(['show']);
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('messages/{message}/read', [MessageController::class, 'markRead'])->name('messages.read');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::get('content', [SettingController::class, 'index'])->name('content.index');
    Route::post('content', [SettingController::class, 'update'])->name('content.update');
});
