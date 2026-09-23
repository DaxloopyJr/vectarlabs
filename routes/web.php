<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// ---------------- Public website ----------------
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [\App\Http\Controllers\SitemapController::class, 'robots'])->name('robots');
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{slug}', [PageController::class, 'service'])->name('services.show');
Route::get('/industries', [PageController::class, 'industries'])->name('industries');
Route::get('/industries/{slug}', [PageController::class, 'industry'])->name('industries.show');
Route::get('/works', [PageController::class, 'works'])->name('works');
Route::get('/works/{slug}', [PageController::class, 'work'])->name('works.show');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/insights', [PageController::class, 'insights'])->name('insights');
Route::get('/insights/{id}', [PageController::class, 'insight'])->name('insights.show');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/team/{slug}', [PageController::class, 'teamMember'])->name('team.show');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ---------------- Admin auth ----------------
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.store');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// ---------------- Admin panel ----------------
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('services', ServiceController::class)->except(['show']);
    Route::resource('industries', IndustryController::class)->except(['show']);
    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('works', WorkController::class)->except(['show']);
    Route::resource('team', TeamController::class)->except(['show']);
    Route::resource('posts', PostController::class)->except(['show']);
    Route::resource('slides', \App\Http\Controllers\Admin\HeroSlideController::class)->except(['show'])->parameters(['slides' => 'slide']);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class)->except(['show']);
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('messages/{message}/read', [MessageController::class, 'markRead'])->name('messages.read');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::get('content', [SettingController::class, 'index'])->name('content.index');
    Route::post('content', [SettingController::class, 'update'])->name('content.update');
});
