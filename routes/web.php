<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashoardController;


Route::get('/', function () {
    return view('index');
})->middleware('guest');

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
   Auth::routes();
});

Route::group(array('prefix' => 'dashboard',  'PreventBackHistory'), function(){
    Route::get('admin', [DashoardController::class, 'index'])
        ->name('admin');    
});
   

