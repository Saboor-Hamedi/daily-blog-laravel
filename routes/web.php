<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;


Route::get('/', [FrontController::class, 'index']);
Route::get('show/{post}', [FrontController::class, 'show'])->name('show');
Route::middleware(['middleware' => 'preventBack'])->group(function () {
   Auth::routes();
});
Route::group(array('prefix' => 'dashboard', 'preventBack'),function(){
    // admin
   Route::middleware([ 'auth', 'isAdmin'])->group(function(){
      Route::get('admin', [AdminController::class, 'index'])
            ->name('admin');
   });
   // user
   Route::group(array('prefix' => '', 'as' => 'dashboard.',  'preventBack'), function(){
        Route::get('user', [UserController::class, 'index'])
            ->name('user');   

    });
   // profile
 
   Route::group(['prefix' => 'profiles', 'as' => 'profiles.'], function () {
         Route::get('/{profiles:id}', [ProfileController::class, 'index'])->name('index');  
         Route::put('/{profile}', [ProfileController::class, 'update'])->name('update');
   });
    // poost 
   Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('{post:slug}/edit', [PostController::class, 'edit'])->name('edit');
        Route::put('{post:slug}',      [PostController::class, 'update'])->name('update');
        Route::get('{post:slug}/show', [PostController::class, 'show'])->name('show');
        Route::delete('{post:slug}/delete', [PostController::class, 'destroy'])->name('destroy');
    });
  // tags 
     Route::group(['prefix' => 'tags', 'as' => 'tags.'], function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('/create', [TagController::class, 'create'])->name('create');
        Route::post('/store', [TagController::class, 'store'])->name('store');
    });
     // categories 
     Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/categories', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
    });
});

   

