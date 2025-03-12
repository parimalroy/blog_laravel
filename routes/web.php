<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'account'],function(){
    Route::group(['middleware'=>'guest'],function(){
        Route::get('register/index',[AccountController::class,'register'])->name('register.index');
        Route::post('register/create',[AccountController::class,'register_store'])->name('register.create');

        Route::get('login',[AccountController::class,'login'])->name('login.index');
        Route::post('login/store',[AccountController::class,'login_store'])->name('login.store');
    });

    Route::group(['middleware'=>'auth'],function(){
        Route::get('profile',[AccountController::class,'profile_index'])->name('profile.index');
        Route::get('profile/logout',[AccountController::class,'destory'])->name('profile.logout');
    });
    
});



