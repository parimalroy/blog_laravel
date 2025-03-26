<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class,'index'])->name('home.index');
Route::get('/blog/details/{id}', [HomeController::class,'details'])->name('home.detail');
Route::get('/blog/list', [HomeController::class,'list'])->name('home.list');

Route::get('/blog/categorie', [CategoryController::class,'list'])->name('categorie.list');
Route::get('/blog/categorie/single/{id}', [CategoryController::class,'categorie_single'])->name('categorie.single');

Route::get('/blog/comment/index', [AccountController::class,'comment_index'])->name('comment.index');
Route::get('/blog/comment/edit/{id}', [AccountController::class,'comment_edit'])->name('comment.edit');
Route::post('/blog/comment/update', [AccountController::class,'comment_update'])->name('comment.update');

Route::post('/blog/comment/store', [HomeController::class,'comment_store'])->name('comment.store');


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
        Route::get('blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
        Route::post('blog/update',[BlogController::class,'update'])->name('blog.update');
        Route::delete('blog/delete/{id}',[BlogController::class,'destory'])->name('blog.delete');
    });
    
});



