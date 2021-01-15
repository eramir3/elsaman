<?php

use Illuminate\Support\Facades\Route;

//Panels
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

//Saman 
use App\Http\Controllers\ContactController;

// Auth
use App\Http\Controllers\Auth\AuthenticatedAdminSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::redirect('/', '/en');

// Route::group(['prefix' => '/{locale}'], function() {

//     $locale = Request::segment(1);
//     $emptyLocale = '';

//     // if (!in_array($locale, [
//     //     Config::get('constants.en'), 
//     //     Config::get('constants.fr'), 
//     //     Config::get('constants.es'),
//     //     $emptyLocale
//     // ])) {
//     //     abort(404);
//     // }

//     Route::get('/', function () {
//         return view('saman/welcome');
//     })->name('saman.welcome');
    
//     Route::get('about', function () {
//         return view('saman/about');
//     })->name('saman.about');
    
//     Route::get('products', function () {
//         return view('saman/products');
//     })->name('saman.products');
    
//     Route::get('contact', function () {
//         return view('saman/contact');
//     })->name('saman.contact');

//     Route::post('contact', [ContactController::class, 'mail'])->name('contact.mail');
// });

Route::get('/', function () {
    return view('saman/welcome');
})->name('saman.welcome');

Route::get('about', function () {
    return view('saman/about');
})->name('saman.about');

Route::get('products', function () {
    return view('saman/products');
})->name('saman.products');

Route::get('contact', function () {
    return view('saman/contact');
})->name('saman.contact');

Route::post('contact', [ContactController::class, 'mail'])->name('contact.mail');

Route::group(['prefix'=>'admin', 'middleware'=>'admin:admin'], function(){
    Route::get('/login', [AuthenticatedAdminSessionController::class, 'loginForm'])->name('admin.login.form');
    Route::post('/login', [AuthenticatedAdminSessionController::class, 'store'])->middleware('admin');
});

Route::group(['prefix'=>'admin'], function(){
    Route::post('/logout', [AuthenticatedAdminSessionController::class, 'destroy'])->middleware('admin')->name('admin.logout');
});

Route::middleware(['auth:admin','verified'])->get('/admin/dashboard', function() {
    return view('panels/admin/index');
})->name('admin.dashboard');

Route::middleware(['auth:web','verified'])->get('/dashboard', function() {
    return view('panels/user/index');
})->name('dashboard');


Route::middleware(['auth:web','verified'])->group(function() {
    Route::get('/user/profile', [UserController::class, 'show'])->name('user.profile');
    Route::put('/user/{user}/update', [UserController::class, 'update'])->name('user.profile.update');
    Route::get('/user/change-password', [UserController::class, 'changePassword'])->name('user.password.change');
    Route::put('/user/{user}/change-password/update', [UserController::class, 'updatePassword'])->name('user.password.change.update');
});

Route::middleware(['auth:admin','verified'])->group(function() {
    
    // Account
    Route::get('admin/profile', [AdminController::class, 'show'])->name('admin.profile');
    Route::put('admin/{user}/update', [AdminController::class, 'update'])->name('admin.profile.update');
    Route::get('admin/change-password', [AdminController::class, 'changePassword'])->name('admin.password.change');
    Route::put('admin/{user}/change-password/update', [AdminController::class, 'updatePassword'])->name('admin.password.change.update');
    
    // Categories
    Route::get('admin/categories', [CategoryController::class, 'index'])->name('category.index');
});




require __DIR__.'/auth.php';