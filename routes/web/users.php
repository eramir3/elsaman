<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function() {
    //Route::get('/admin/users/edit/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/update/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/delete/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth','role:admin'])->group(function() {
    Route::get('/admin/users/index', [UserController::class, 'index'])->name('admin.users.index');
    Route::put('/admin/users/{user}/attach', [UserController::class, 'attachRole'])->name('admin.users.role.attach');
    Route::put('/admin/users/{user}/detach', [UserController::class, 'detachRole'])->name('admin.users.role.detach');
});

Route::middleware(['auth', 'can:view,user'])->group(function() {
    Route::get('/admin/users/profile/{user}', [UserController::class, 'show'])->name('admin.users.show');
});