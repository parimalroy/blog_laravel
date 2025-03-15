<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;

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
        Route::get('profile/edit',[AccountController::class,'profile_edit'])->name('profile.edit');
        Route::post('profile/update',[AccountController::class,'profile_update'])->name('profile.update');


        Route::get('category/index',[CategoryController::class,'index'])->name('category.index');
        Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
        Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('category/update',[CategoryController::class,'update'])->name('category.update');


        Route::get('blog/index',[BlogController::class,'index'])->name('blog.index');
        Route::get('blog/create',[BlogController::class,'create'])->name('blog.create');
        Route::post('blog/store',[BlogController::class,'store'])->name('blog.store');
    });
    
});



