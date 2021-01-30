<?php

use Illuminate\Support\Facades\Route;

// Panel
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\Panel\Admin\CustomerController;

// Home
use App\Http\Controllers\Home\LearnController;
use App\Http\Controllers\ContactController;

// Auth
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisteredCustomerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\AuthenticatedCustomerSessionController;

use Saman\Utils\Hasher;

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


//   \Auth::logout(); \Session::flush();

Route::redirect('/', '/en');

Route::group(['prefix' => '/{locale}'], function() {

    $locale = Request::segment(1);
    $emptyLocale = '';

    $languages = [
        Config::get('constants.en'), 
        Config::get('constants.fr'), 
        Config::get('constants.es'),
        $emptyLocale
    ];

    if (in_array($locale, $languages)) 
    {    
        Route::get('/', function () {
            return view('layouts/welcome');
        })->name('home.welcome');
        
        Route::get('about', function () {
            return view('home/about');
        })->name('home.about');
        
        Route::get('products', function () {
            return view('home/products');
        })->name('home.products');

        Route::get('learn', [LearnController::class, 'index'])->name('home.learn');
        
        Route::get('contact', function () {
            return view('home/contact');
        })->name('home.contact');
    
        Route::post('contact', [ContactController::class, 'mail'])->name('contact.mail');
    }
});





Route::middleware(['auth:web,customer','verified'])->group(function() {

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/password', [ProfileController::class, 'editPassword'])->name('profile.password');
    Route::put('profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});





/********** Customer Routes *****************/
// login
Route::get('/login', [AuthenticatedCustomerSessionController::class, 'create'])->name('login.form');
Route::post('/login', [AuthenticatedCustomerSessionController::class, 'store'])->name('login');

// Register
Route::get('/register', [RegisteredCustomerController::class, 'create'])->name('register');
Route::post('/register', [RegisteredCustomerController::class, 'store']);

Route::middleware(['auth:customer','verified'])->group(function() {
    
    // logout
    Route::post('logout', [AuthenticatedCustomerSessionController::class, 'destroy'])->name('logout');

    // Dashboard
    Route::get('dashboard', function() {
        return view('panel/customer/dashboard');
    })->name('dashboard');

});











/********** User Routes *****************/

Route::group(['prefix'=>'admin', 'middleware'=>'guest'], function(){
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login.form');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('admin.login');
});


Route::group(['prefix'=>'admin', 'middleware'=>['auth:web','verified']], function(){

    // logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

    // Dashboard
    Route::get('dashboard', function() {
        return view('panel/admin/dashboard');
    })->name('admin.dashboard');

    // Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::put('users/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}/delete', [UserController::class, 'destroy'])->name('users.delete');

    // Customers
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::put('customers/{id}/update', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('customers/{id}/delete', [CustomerController::class, 'destroy'])->name('customers.delete');
    
    // Post Categories
    Route::get('categories/posts', [PostCategoryController::class, 'index'])->name('categories.posts.index');
    Route::post('categories/posts/store', [PostCategoryController::class, 'store'])->name('categories.posts.store');
    Route::put('categories/posts/{id}/update', [PostCategoryController::class, 'update'])->name('categories.posts.update');
    Route::delete('categories/posts/{id}/delete', [PostCategoryController::class, 'destroy'])->name('categories.posts.delete');

    // Product Categories
    Route::get('categories/products', [ProductCategoryController::class, 'index'])->name('categories.products.index');
    Route::post('categories/products/store', [ProductCategoryController::class, 'store'])->name('categories.products.store');
    Route::put('categories/products/{id}/update', [ProductCategoryController::class, 'update'])->name('categories.products.update');
    Route::delete('categories/products/{id}/delete', [ProductCategoryController::class, 'destroy'])->name('categories.products.delete');

    // Coupons
    Route::get('coupons', [CouponController::class, 'index'])->name('coupons.index');
    Route::post('coupons/store', [CouponController::class, 'store'])->name('coupons.store');
    Route::put('coupons/{id}/update', [CouponController::class, 'update'])->name('coupons.update');
    Route::delete('coupons/{id}/delete', [CouponController::class, 'destroy'])->name('coupons.delete');

    // Products
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{id}/delete', [ProductController::class, 'destroy'])->name('products.delete');
    
    Route::put('products/{id}/images/store', [ProductController::class, 'storeImage'])->name('products.image.store');
    Route::put('products/{id}/images/{image_id}/update', [ProductController::class, 'updateImage'])->name('products.image.update');
    Route::delete('products/{id}/images/{image_id}/delete', [ProductController::class, 'destroyImage'])->name('products.image.delete');

    // Posts
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{id}/update', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{id}/delete', [PostController::class, 'destroy'])->name('posts.delete');
});

// Hashids
Route::bind('id', function ($id) {
    return Hasher::decode($id);
});



//require __DIR__.'/auth.php';