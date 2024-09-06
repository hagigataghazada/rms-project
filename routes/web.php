<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthAdminController;
use App\Http\Controllers\AnnouncementsController;



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
    Route::post('/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');

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
Route::middleware(['auth.admin'])->group(function () {
    Route::get('/residents/create', [ResidentController::class, 'create'])->name('residents.create');
    Route::post('/residents/store', [ResidentController::class, 'store'])->name('residents.store');
    Route::get('/residents/list', [ResidentController::class, 'index'])->name('residents.list');
    Route::get('/residents/{id}/edit', [ResidentController::class, 'edit'])->name('residents.edit');
    Route::put('/residents/{id}', [ResidentController::class, 'update'])->name('residents.update');
    Route::delete('/residents/{id}', [ResidentController::class, 'destroy'])->name('residents.destroy');
});

// Home Route

//Route::get('/aa',function (){
//    return view('residents.list');
//});
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

// Building Routes
Route::resource('buildings', BuildingController::class);
Route::resource('buildings', BuildingController::class)->only(['index', 'create', 'store', 'show']);
Route::get('/buildings/list', [BuildingController::class, 'index'])->name('buildings.list');

// Apartment Routes
Route::resource('apartments', ApartmentController::class)->only(['create', 'index', 'store']);
Route::get('/apartments/create', [ApartmentController::class, 'create'])->name('apartments.create');
Route::get('/apartments/list', [ApartmentController::class, 'index'])->name('apartments.list');
Route::post('/apartments/store', [ApartmentController::class, 'store'])->name('apartments.store');
Route::resource('apartments', ApartmentController::class);

// Services routes
// Sadece show hariç tüm CRUD rotalarını tanımlar
Route::resource('services', ServiceController::class)->except(['show']);

// Eğer sadece 'create', 'list', 'store', 'edit' rotalarını bireysel tanımlamak istiyorsanız:
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::get('/services/list', [ServiceController::class, 'index'])->name('services.list');
Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

// Payment Routes
Route::resource('payments', PaymentController::class)->only(['create', 'index', 'store']);
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::get('/payments/list', [PaymentController::class, 'index'])->name('payments.list');
Route::post('/payments/store', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update');

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

Route::get('/announcements/partials/for-sale', [ApartmentController::class, 'showForSaleApartments'])->name('forSale');
Route::get('/announcements/partials/for-rent', [ApartmentController::class, 'showForRentApartments'])->name('forRent');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//admin register formu


Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.post');

//admin logout
Route::post('/admin/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');

// web.php
// routes/web.php

use App\Http\Controllers\users\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/login', [App\Http\Controllers\users\LoginController::class, 'login'])->name('login.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

});

use App\Http\Controllers\NotificationController;


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/notifications', [NotificationController::class, 'index'])->name('admin.notifications.index');
    Route::get('/admin/notifications/create', [NotificationController::class, 'create'])->name('admin.notifications.create');
    Route::post('/admin/notifications', [NotificationController::class, 'store'])->name('admin.notifications.store');
    Route::delete('/admin/notifications/{id}', [NotificationController::class, 'destroy'])->name('admin.notifications.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('user.notifications');
});
Route::get('/user/dashboard1', [LoginController::class, 'login'])->name('user.dashboard1');
Route::middleware(['auth'])->group(function () {

    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('user.profile');

    // routes/web.php
    Route::get('/user/services', [UserController::class, 'services'])->name('user.services');
    Route::get('/user/profile/edit', [UserProfileController::class, 'edit'])->name('user.profile.edit');
    Route::post('/user/profile/update', [UserProfileController::class, 'update'])->name('user.profile.update');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/payments', [UserController::class, 'payments'])->name('user.payments');
    // Diğer user rotaları
});

Route::post('/user/logout', [LoginController::class, 'logout'])->name('user.logout');
Route::middleware(['auth.admin'])->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'editProfile'])->name('admin.edit');
    Route::put('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
});



