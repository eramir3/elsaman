<?php

use Illuminate\Support\Facades\Route;

//Panels
use App\Http\Controllers\UserController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

//Saman 
use App\Http\Controllers\ContactController;

// Auth
use App\Http\Controllers\Auth\AuthenticatedAdminSessionController;

use App\Services\HasherService;

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
    // \Auth::logout();
    // \Session::flush();
    Route::get('/login', [AuthenticatedAdminSessionController::class, 'loginForm'])->name('admin.login.form');
    Route::post('/login', [AuthenticatedAdminSessionController::class, 'store'])->middleware('admin');
});

Route::group(['prefix'=>'admin'], function(){
    Route::post('/logout', [AuthenticatedAdminSessionController::class, 'destroy'])->middleware('admin')->name('admin.logout');
});

Route::middleware(['auth:admin','verified'])->get('/admin/dashboard', function() {
    // \Auth::logout();
    // \Session::flush();
    return view('panels/admin/dashboard');
})->name('admin.dashboard');

Route::middleware(['auth:web','verified'])->get('/dashboard', function() {
    // \Auth::logout();
    // \Session::flush();
    return view('panels/user/dashboard');
})->name('dashboard');


Route::middleware(['auth:web','verified'])->group(function() {
//     \Auth::logout();
// \Session::flush();
    
});


Route::middleware(['auth:web,admin','verified'])->group(function() {
    //     \Auth::logout();
    // \Session::flush();
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/password', [ProfileController::class, 'editPassword'])->name('profile.password');
    Route::put('profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    
});

Route::middleware(['auth:admin','verified'])->group(function() {
    // \Auth::logout();
    // \Session::flush();
    
    // !Poner el prefix de admin!!!

    // Users
    Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
    Route::put('admin/users/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('admin/users/{id}/delete', [UserController::class, 'destroy'])->name('users.delete');
    
    // Categories
    Route::get('admin/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('admin/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('admin/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('admin/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.delete');

    // Coupons
    Route::get('admin/coupons', [CouponController::class, 'index'])->name('coupons.index');
    Route::post('admin/coupons/store', [CouponController::class, 'store'])->name('coupons.store');
    Route::put('admin/coupons/{id}/update', [CouponController::class, 'update'])->name('coupons.update');
    Route::delete('admin/coupons/{id}/delete', [CouponController::class, 'destroy'])->name('coupons.delete');

    // Products
    Route::get('admin/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('admin/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('admin/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('admin/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.delete');
    
    Route::put('admin/products/{id}/images/store', [ProductController::class, 'storeImage'])->name('products.image.store');
    Route::put('admin/products/{id}/images/{image_id}/update', [ProductController::class, 'updateImage'])->name('products.image.update');
    Route::delete('admin/products/{id}/images/{image_id}/delete', [ProductController::class, 'destroyImage'])->name('products.image.delete');

});

// Hashids
Route::bind('id', function ($id) {
    return HasherService::decode($id);
});




require __DIR__.'/auth.php';