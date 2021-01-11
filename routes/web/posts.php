<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::middleware('auth')->group(function() {
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts/store', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/admin/posts/edit/{post}', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::patch('/admin/posts/update/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/delete/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
});