<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LanguagesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\MainCategoriesController;
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


            ############# BEGIN Main Vendor Route ##############
            route::group(['prefix'=>'vendor'],function(){
                route::get('/',[VendorController::class, 'index'])->name('admin.vendor');
                route::get('create',[VendorController::class, 'create'])->name('admin.vendor.create');
                route::post('store',[VendorController::class, 'store'])->name('admin.vendor.store');

                route::get('edit/{id}',[VendorController::class, 'edit'])->name('admin.vendor.edit');
                route::post('update/{id}',[VendorController::class, 'update'])->name('admin.vendor.update');
                route::get('delete/{id}',[VendorController::class, 'destroy'])->name('admin.vendor.delete');

                route::get('changeStatus/{id}',[VendorController::class, 'changeStatus'])->name('admin.vendor.status');
            });
            ############# end Main Vendor Route ##############
        });



route::group(['namespace'=>'Admin','middleware'=>'guest:admin'],function(){

    Route::get('/login', [LoginController::class, 'getLogin'])->name('get.admin.login');
    Route::post('/adminLogin', [LoginController::class, 'login'])->name('admin.login');

});
