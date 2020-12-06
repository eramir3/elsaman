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

// Route::get('/welcome2', function () {
//     return view('welcome2');
// });

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');





// Route::get('/{locale}', function ($locale) {

//     // if (! in_array($locale, ['en', 'fr', 'es'])) {
//     //     abort(400);
//     // }

//     App::setLocale($locale);

//     return view('welcome');

// })->name('welcome');


// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

// Route::get('about', function () {
//     return view('about');
// })->name('about');

// Route::get('our-fruits', function () {
//     return view('our-fruits');
// })->name('our-fruits');

// Route::get('products', function () {
//     return view('products');
// })->name('products');

// Route::get('contact', function () {
//     return view('contact');
// })->name('contact');


Route::redirect('/', '/en');

Route::group(['prefix' => '/{locale}'], function() {

    $locale = Request::segment(1);
    if (!in_array($locale, [
        Config::get('constants.en'), 
        Config::get('constants.fr'), 
        Config::get('constants.es')
    ])) {
        abort(404, 'Page not found');
    }

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    
    Route::get('about', function () {
        return view('about');
    })->name('about');
    
    Route::get('our-fruits', function () {
        return view('our-fruits');
    })->name('our-fruits');
    
    Route::get('products', function () {
        return view('products');
    })->name('products');
    
    Route::get('contact', function () {
        return view('contact');
    })->name('contact');

    Route::post('contact', [ContactController::class, 'mail'])->name('contact.mail');
});