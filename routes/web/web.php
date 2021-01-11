<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\HomeController;


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

Auth::routes();

Route::redirect('/', '/en');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/blog', [BlogController::class, 'index'])->name('saman.blog.index');

Route::get('/blog/post/{post}', [BlogController::class, 'show'])->name('saman.blog.post.show');

Route::middleware('auth')->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::group(['prefix' => '/{locale}'], function() {

    $locale = Request::segment(1);
    $emptyLocale = '';

    // if (!in_array($locale, [
    //     Config::get('constants.en'), 
    //     Config::get('constants.fr'), 
    //     Config::get('constants.es'),
    //     $emptyLocale
    // ])) {
    //     abort(404);
    // }

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
});

