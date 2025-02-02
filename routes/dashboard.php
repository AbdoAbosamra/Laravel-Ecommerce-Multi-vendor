<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth',
    'prefix'=>'dashboard',
    'as'=>'dashboard.'
] , function (){
    Route::get('/', [DashboardController::class , 'index'] )->name('dashboard');
    Route::resource('/categories' , CategoriesController::class);

}
);
