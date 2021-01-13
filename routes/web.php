<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::group(['middleware'=>'auth:admin'], function(){
//     // routes under the admin
// });

Route::group(['prefix'=>'admin', 'middleware'=>'admin:admin'], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    //Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login.form');
    //Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'store'])
                ->middleware('admin');

    // Route::middleware(['auth:admin','verified'])->get('/admin-dashboard', function() {
    //     return view('admin-dashboard');
    // })->name('admin.dashboard');

    // Route::post('/logout', [AdminController::class, 'destroy'])
    //             ->middleware('admin')
    //             ->name('admin.logout');
});

Route::group(['prefix'=>'admin'], function(){
    Route::post('/logout', [AdminController::class, 'destroy'])
                ->middleware('admin')
                ->name('admin.logout');
});

Route::middleware(['auth:admin','verified'])->get('/admin/dashboard', function() {
    return view('admin/index');
})->name('admin.dashboard');

// Route::middleware(['auth:admin','verified'])->post('/logout', function() {
//     return view('admin-dashboard');
// })->name('admin.dashboard');

// Route::middleware(['auth:admin','verified'])->post('/logout', [AdminController::class, 'destroy'])
// ->middleware('admin')
// ->name('admin.logout');

Route::middleware(['auth:web','verified'])->get('/dashboard', function() {
    return view('user/index');
})->name('dashboard');



// Route::prefix('admin')->group(function () {

//     Route::get('/login', [AdminController::class, 'loginForm']);
//     //Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login.form');
//     Route::post('/login', [AdminController::class, 'store'])->name('admin.login');

// 	Route::middleware(['auth:admin'])->group(function () {
//         Route::get('/admin-dashboard', [AdminController::class, 'testMethod']);
// 	});
// });

require __DIR__.'/auth.php';
