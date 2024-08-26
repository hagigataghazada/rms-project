<?php

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;

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

// Admin Authentication Routes
Route::namespace('App\\Http\\Controllers\\Admin')->prefix('admin')->group(function () {
    Route::get('/login', 'AuthAdminController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdminController@login')->name('admin.login.submit');
    Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

    Route::middleware(['auth.admin'])->group(function () {
        Route::get('/', 'AdminController@index')->name('admin.panel');
        Route::get('/sections/{section}', 'AdminController@loadSection');
    });
});

// User Authentication Routes
Route::namespace('App\\Http\\Controllers\\Users')->group(function () {
    Route::get('/register', 'RegisterController@create')->name('user.register');
    Route::post('/register', 'RegisterController@store')->name('user.register.post');
    Route::get('/login', 'LoginController@create')->name('user.login');
    Route::post('/login', 'LoginController@login')->name('user.login.post');
    Route::post('/logout', 'LoginController@logout')->name('user.logout');
});
// Residents routes
    Route::get('/residents/create', [ResidentController::class, 'create'])->name('residents.create');
    Route::get('/residents/list', [ResidentController::class, 'index'])->name('residents.list');
    Route::post('/residents/store', [ResidentController::class, 'store'])->name('residents.store');

// Home Route
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

// Building Routes
Route::resource('buildings', BuildingController::class)->only(['index', 'create', 'store', 'show']);
Route::get('/buildings/list', [BuildingController::class, 'index'])->name('buildings.list');

// Apartment Routes
Route::resource('apartments', ApartmentController::class)->only(['create', 'index', 'store']);
Route::get('/apartments/create', [ApartmentController::class, 'create'])->name('apartments.create');
Route::get('/apartments/list', [ApartmentController::class, 'index'])->name('apartments.list');
Route::post('/apartments/store', [ApartmentController::class, 'store'])->name('apartments.store');

// Services routes
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::get('/services/list', [ServiceController::class, 'index'])->name('services.list');
Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');

// Payment Routes
Route::resource('payments', PaymentController::class)->only(['create', 'index', 'store']);
// Payments routes
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::get('/payments/list', [PaymentController::class, 'index'])->name('payments.list');
Route::post('/payments/store', [PaymentController::class, 'store'])->name('payments.store');

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('buildings', BuildingController::class, ['as' => 'admin']);
    Route::resource('services', ServiceController::class, ['as' => 'admin'])->only(['create', 'index', 'store']);
    Route::resource('residents', ResidentController::class, ['as' => 'admin'])->only(['create', 'index', 'store']);
    Route::resource('payments', PaymentController::class, ['as' => 'admin'])->only(['create', 'index', 'store']);
});

// Announcements Route
Route::get('announcements/announcements', function () {
    return view('announcements.announcements');
})->name('announcements.index');
Route::get('/announcements/filter', [App\Http\Controllers\AnnouncementsController::class, 'filter'])->name('announcements.filter');

//admin register formu
Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.post');

// Admin Dashboard without Login
Route::get('/adminloginsiz', function () {
    return view('admin.index');
})->name('admin.index');
