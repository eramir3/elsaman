<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::redirect('/', '/en');

Route::group(['prefix' => '/{locale}'], function() {

    $locale = Request::segment(1);
    $emptyLocale = '';

    if (!in_array($locale, [
        Config::get('constants.en'), 
        Config::get('constants.fr'), 
        Config::get('constants.es'),
        $emptyLocale
    ])) {
        abort(404, 'Page not found');
    }

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    
    Route::get('about', function () {
        return view('about');
    })->name('about');
    
    Route::get('products', function () {
        return view('products');
    })->name('products');
    
    Route::get('contact', function () {
        return view('contact');
    })->name('contact');

    Route::post('contact', [ContactController::class, 'mail'])->name('contact.mail');
});