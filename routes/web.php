<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;


Route::get('/', [FrontController::class, 'index']);
Route::get('show/{post}', [FrontController::class, 'show'])->name('show');
// Route::get('front/visit/', [FrontController::class, 'visit'])->name('visit');
Route::middleware(['middleware' => 'preventBack'])->group(function () {
   Auth::routes();
});
Route::group(array('prefix' => 'dashboard', 'preventBack'),function(){
    // dashboard
    Route::group(array('prefix' => '', 'as' => 'dashboard.',  'preventBack'), function(){
        Route::get('admin', [DashboardController::class, 'index'])
            ->name('admin');    
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

   

