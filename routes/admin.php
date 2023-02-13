<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LanguagesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\MainCategoriesController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

        define('PAGINATION_COUNT',10);
        route::group(['namespace'=>'Admin','middleware'=>'auth:admin'],function(){
        route::get('/',[DashboardController::class, 'index'])->name('admin.dashboard');
        ############# BEGIN lANG Route ##############
            route::group(['prefix'=>'languages'],function(){
                route::get('/',[LanguagesController::class, 'index'])->name('admin.languages');
                route::get('create',[LanguagesController::class, 'create'])->name('admin.languages.create');
                route::post('store',[LanguagesController::class, 'store'])->name('admin.languages.store');
                route::get('edit/{id}',[LanguagesController::class, 'edit'])->name('admin.languages.edit');
                route::post('update/{id}',[LanguagesController::class, 'update'])->name('admin.languages.update');
                route::get('delete/{id}',[LanguagesController::class, 'destroy'])->name('admin.languages.delete');
            });
             ############# end lANG Route ##############

             ############# BEGIN Main Catg Route ##############
            route::group(['prefix'=>'main_categories'],function(){
                route::get('/',[MainCategoriesController::class, 'index'])->name('admin.mainCategories');
                route::get('create',[MainCategoriesController::class, 'create'])->name('admin.mainCategories.create');
                route::post('store',[MainCategoriesController::class, 'store'])->name('admin.mainCategories.store');
                route::get('edit/{id}',[MainCategoriesController::class, 'edit'])->name('admin.mainCategories.edit');
                route::post('update/{id}',[MainCategoriesController::class, 'update'])->name('admin.mainCategories.update');
                route::get('delete/{id}',[MainCategoriesController::class, 'destroy'])->name('admin.mainCategories.delete');
                route::get('changeStatus/{id}',[MainCategoriesController::class, 'changeStatus'])->name('admin.mainCategories.status');
            });
             ############# end Main Catg Route ##############

            ############# BEGIN Sub Catgory Route ##############
            route::group(['prefix'=>'sub_categories'],function(){
                route::get('/',[SubCategoryController::class, 'index'])->name('admin.subCategories');
                route::get('create',[SubCategoryController::class, 'create'])->name('admin.subCategories.create');
                route::post('store',[SubCategoryController::class, 'store'])->name('admin.subCategories.store');
                route::get('edit/{id}',[SubCategoryController::class, 'edit'])->name('admin.subCategories.edit');
                route::post('update/{id}',[SubCategoryController::class, 'update'])->name('admin.subCategories.update');
                route::get('delete/{id}',[SubCategoryController::class, 'destroy'])->name('admin.subCategories.delete');
                route::get('changeStatus/{id}',[SubCategoryController::class, 'changeStatus'])->name('admin.subCategories.status');
            });
            ############# end Sub Catgory Route ##############


            ############# BEGIN Main Vendor Route ##############
            route::group(['prefix'=>'user'],function(){
                route::get('/',[UserController::class, 'index'])->name('admin.user');
                route::get('create',[UserController::class, 'create'])->name('admin.user.create');
                route::post('store',[UserController::class, 'store'])->name('admin.user.store');
                route::get('edit/{id}',[UserController::class, 'edit'])->name('admin.user.edit');
                route::post('update/{id}',[UserController::class, 'update'])->name('admin.user.update');
                route::get('delete/{id}',[UserController::class, 'destroy'])->name('admin.user.delete');

                route::get('changeStatus/{id}',[UserController::class, 'changeStatus'])->name('admin.user.status');
            });
            ############# end Main Vendor Route ##############

            ############# BEGIN Main Vendor Route ##############
            route::group(['prefix'=>'product'],function(){
                route::get('/',[ProductController::class, 'index'])->name('admin.product');
                route::get('create',[ProductController::class, 'create'])->name('admin.product.create');
                route::post('store',[ProductController::class, 'store'])->name('admin.product.store');

                route::get('edit/{id}',[ProductController::class, 'edit'])->name('admin.product.edit');
                route::post('update/{id}',[ProductController::class, 'update'])->name('admin.product.update');
                route::get('delete/{id}',[ProductController::class, 'destroy'])->name('admin.product.delete');

                route::get('changeStatus/{id}',[ProductController::class, 'changeStatus'])->name('admin.product.status');
            });
            ############# end Main Vendor Route ##############
        });





//route::group(['namespace'=>'Admin','middleware'=>'guest:admin'],function(){
//
//    Route::get('/login', [LoginController::class, 'getLogin'])->name('get.admin.login');
//    Route::post('/adminLogin', [LoginController::class, 'login'])->name('admin.login');
//
//});

     Route::group(['middleware' => ['web']], function () {
    Route::get('web-login', 'Auth\AuthController@webLogin');
    Route::post('web-login', ['as'=>'web-login','uses'=>'Auth\AuthController@webLoginPost']);
    Route::get('/adminLogin', [LoginController::class, 'getLogin'])->name('get.admin.login');
    Route::post('/adminLogin', [LoginController::class, 'login'])->name('admin.login');
//    Route::get('admin-login', 'AdminAuth\AuthController@adminLogin');
//    Route::post('admin-login', ['as'=>'admin-login','uses'=>'AdminAuth\AuthController@adminLoginPost']);
});


