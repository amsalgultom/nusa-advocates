<?php

use App\Http\Controllers\Admin\AboutBSController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FranschiseController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\LawyerController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PartnershipController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TestimonyController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\PracticeAreaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['setLocale'])->group(function () {
    Route::get('/');
    Route::get('/{lang}', [ViewController::class, 'home'])->name('home');
    Route::get('/{lang}/about', [ViewController::class, 'about'])->name('about');
    Route::get('/{lang}/contact', [ViewController::class, 'contact'])->name('contact');
    Route::get('/{lang}/principal_lawyer', [ViewController::class, 'lawyer'])->name('principal_lawyer');
    Route::get('/{lang}/practice_area', [ViewController::class, 'practice_area'])->name('practice_area');
    Route::get('/{lang}/news', [ViewController::class, 'news'])->name('news');
    Route::get('/{lang}/news/{slug}', [ViewController::class, 'newsdetail'])->name('newsdetail');
    Route::get('/{lang}/gallery', [ViewController::class, 'gallery'])->name('gallery');
});

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/admin/register', 'register')->name('register');
    Route::post('/admin/store', 'store')->name('store');
    Route::get('/admin/login', 'login')->name('login');
    Route::post('/admin/authenticate', 'authenticate')->name('authenticate');
    Route::get('/admin/dashboards', 'dashboard')->name('dashboards');
    Route::post('/admin/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/admin-dashboard', 'index')->name('dashboard');
        Route::post('/admin/admin-profile', 'profile')->name('profile');
    });

    Route::controller(PracticeAreaController::class)->group(function () {
        Route::get('/admin/admin-practice', 'index')->name('practice.index');
        Route::get('/admin/admin-practice/create', 'create')->name('practice.create');
        Route::post('/admin/admin-practice/store', 'store')->name('practice.store');
        Route::get('/admin/admin-practice/edit/{practice}', 'edit')->name('practice.edit');
        Route::put('/admin/admin-practice/update/{practice}', 'update')->name('practice.update');
        Route::post('/admin/admin-practice/delete', 'delete')->name('practice.delete');
    });

    Route::controller(LawyerController::class)->group(function () {
        Route::get('/admin/admin-lawyer', 'index')->name('lawyer.index');
        Route::get('/admin/admin-lawyer/create', 'create')->name('lawyer.create');
        Route::post('/admin/admin-lawyer/store', 'store')->name('lawyer.store');
        Route::get('/admin/admin-lawyer/edit/{lawyer}', 'edit')->name('lawyer.edit');
        Route::put('/admin/admin-lawyer/update/{lawyer}', 'update')->name('lawyer.update');
        Route::post('/admin/admin-lawyer/delete', 'delete')->name('lawyer.delete');
    });

    Route::controller(GalleryController::class)->group(function () {
        Route::get('/admin/admin-gallery', 'index')->name('gallery.index');
        Route::get('/admin/admin-gallery/create', 'create')->name('gallery.create');
        Route::post('/admin/admin-gallery/store', 'store')->name('gallery.store');
        Route::get('/admin/admin-gallery/edit/{gallery}', 'edit')->name('gallery.edit');
        Route::put('/admin/admin-gallery/update/{gallery}', 'update')->name('gallery.update');
        Route::post('/admin/admin-gallery/delete', 'delete')->name('gallery.delete');
    });

    Route::controller(NewsController::class)->group(function () {
        Route::get('/admin/admin-news', 'index')->name('news.index');
        Route::get('/admin/admin-news/create', 'create')->name('news.create');
        Route::post('/admin/admin-news/store', 'store')->name('news.store');
        Route::get('/admin/admin-news/edit/{news}', 'edit')->name('news.edit');
        Route::put('/admin/admin-news/update/{news}', 'update')->name('news.update');
        Route::post('/admin/admin-news/delete', 'delete')->name('news.delete');
    });

    Route::controller(GeneralController::class)->group(function () {
        Route::get('/admin/admin-general', 'index')->name('general.index');
        Route::get('/admin/admin-general/create', 'create')->name('general.create');
        Route::post('/admin/admin-general/store', 'store')->name('general.store');
        Route::get('/admin/admin-general/edit/{general}', 'edit')->name('general.edit');
        Route::put('/admin/admin-general/update/{general}', 'update')->name('general.update');
        Route::post('/admin/admin-general/delete', 'delete')->name('general.delete');
    });

});
