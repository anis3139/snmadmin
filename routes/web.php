<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PromoCodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */





Route::get('admin/login', '\App\Http\Controllers\Admin\Auth\LoginController@login')->name('admin.login')->middleware('admin.guest');
Route::post('admin/onLogin', '\App\Http\Controllers\Admin\Auth\LoginController@onLogin')->name('admin.onLogin')->middleware('admin.guest');

Route::namespace ('\App\Http\Controllers\Admin')->middleware(['admin.auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //manage user
    Route::prefix('common')->group(function () {
        Route::get('/delete', 'CommonController@destroy')->name('common.destroy');
        Route::get('/print', 'CommonController@prints')->name('common.print');
        Route::get('/export', 'CommonController@export')->name('common.export');
        Route::post('/import', 'CommonController@import')->name('common.import');
        Route::get('/samplefiledownload', 'CommonController@sampleFileDownload')->name('common.samplefiledownload');

    });

    Route::prefix('admin')->group(function () {

        Route::resource('roles', 'RolesController', ['names' => 'admin.roles']);
        Route::get('/dashboard', 'Auth\AdminController@index')->name('admin.index');
        Route::get('/create', 'Auth\AdminController@create')->name('admin.create');
        Route::post('/store', 'Auth\AdminController@store')->name('admin.store');
        Route::get('/edit/{id}', 'Auth\AdminController@edit')->name('admin.edit');
        Route::get('/show/{id}', 'Auth\AdminController@show')->name('admin.show');
        Route::post('/update/{id}', 'Auth\AdminController@update')->name('admin.update');
        Route::get('/delete/{id}', 'Auth\AdminController@destroy')->name('admin.destroy');

        Route::get('/profile/{id}', 'Auth\AdminController@profile')->name('admin.profile');
        Route::post('/changePassword', 'Auth\AdminController@changePassword')->name('admin.changePassword');
        Route::post('/admin-role/update/{id}', 'Auth\AdminController@roleUpdate')->name('admin.role.update');
    });

    Route::prefix('category')->group(function () {
        Route::get('/list', 'CategoryController@index')->name('category.index');
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::post('/create', 'CategoryController@store')->name('category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/edit/{id}', 'CategoryController@update')->name('category.update');
        Route::delete('/delete/{id}', 'CategoryController@destroy')->name('category.delete');
    });
    Route::prefix('sub-category')->group(function () {
        Route::get('/list', 'SubCategoryController@index')->name('subcategory.index');
        Route::get('/create', 'SubCategoryController@create')->name('subcategory.create');
        Route::post('/create', 'SubCategoryController@store')->name('subcategory.store');
        Route::get('/edit/{id}', 'SubCategoryController@edit')->name('subcategory.edit');
        Route::post('/edit/{id}', 'SubCategoryController@update')->name('subcategory.update');
        Route::delete('/delete/{id}', 'SubCategoryController@destroy')->name('subcategory.delete');

        //for catch subcategory image
        Route::get('/subcategory/list', 'SubCategoryController@ajaxGetData')->name('subcategory.ajaxdata');
    });

    Route::prefix('tag')->group(function () {
        Route::get('/list', 'TagController@index')->name('tag.index');
        Route::get('/create', 'TagController@create')->name('tag.create');
        Route::post('/create', 'TagController@store')->name('tag.store');
        Route::get('/edit/{id}', 'TagController@edit')->name('tag.edit');
        Route::post('/edit/{id}', 'TagController@update')->name('tag.update');
        Route::delete('/delete/{id}', 'TagController@destroy')->name('tag.delete');
    });

    //manage comment
    Route::prefix('comment')->group(function () {
        Route::get('comment', 'CommentController@index')->name('comment.list');
        Route::get('approve/approve-list', 'CommentController@approveList')->name('comment.approve.list');
        Route::get('pending/pending-list', 'CommentController@pendingList')->name('comment.pending.list');
        Route::get('pending/list/approve/{id}', 'CommentController@pendingListApprove')->name('comment.pending.list.approve');
        Route::delete('delete/{id}', 'CommentController@destroy')->name('comment.destroy');
    });

    //filter data
    Route::prefix('filter')->group(function () {
        Route::get('/list', 'FilterController@index')->name('filter.view');
        Route::get('/list/data', 'FilterController@filter')->name('filter.list');
        Route::get('/subcategory/list', 'FilterController@ajaxGetSubcategoryData')->name('filter.getsubcategory');

    });

    Route::prefix('news')->group(function () {
        Route::get('/list', 'NewsController@index')->name('news.index');
        Route::get('/create', 'NewsController@create')->name('news.create');
        Route::post('/create', 'NewsController@store')->name('news.store');
        Route::get('/view/{id}', 'NewsController@view')->name('news.view');
        Route::get('/edit/{id}', 'NewsController@edit')->name('news.edit');
        Route::post('/edit/{id}', 'NewsController@update')->name('news.update');
        Route::delete('/delete/{id}', 'NewsController@destroy')->name('news.delete');
    });

    //manage Contact
    Route::prefix('contact')->group(function () {
        Route::get('/list', 'ContactController@index')->name('contact.index');

    });


    //manage setting
    Route::prefix('setting')->group(function () {
        Route::get('/list', 'SettingController@index')->name('setting.index');
        Route::get('/create', 'SettingController@create')->name('setting.create');
        Route::post('/store', 'SettingController@store')->name('setting.store');
        Route::post('/update/{id}', 'SettingController@update')->name('setting.update');
    });
    //banner
    Route::resource('banners', 'BannerController');

    Route::post('admin/logout', 'Auth\LoginController@onLogout')->name('admin.logout');
});
