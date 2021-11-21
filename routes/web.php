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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace ('\App\Http\Controllers\Admin')->group(function () {
    //manage user
    Route::prefix('common')->group(function () {
        Route::get('/delete', 'CommonController@destroy')->name('common.destroy');
        Route::get('/print', 'CommonController@prints')->name('common.print');
        Route::get('/export', 'CommonController@export')->name('common.export');
        Route::post('/import', 'CommonController@import')->name('common.import');
        Route::get('/samplefiledownload', 'CommonController@sampleFileDownload')->name('common.samplefiledownload');

    });

    Route::prefix('user')->group(function () {
        Route::get('/', 'Auth\UserController@index')->name('user.index');
        Route::get('/create', 'Auth\UserController@create')->name('user.create');
        Route::post('/store', 'Auth\UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'Auth\UserController@edit')->name('user.edit');
        Route::get('/show/{id}', 'Auth\UserController@show')->name('user.show');
        Route::post('/update/{id}', 'Auth\UserController@update')->name('user.update');
        Route::get('/delete/{id}', 'Auth\UserController@destroy')->name('user.destroy');

        Route::get('/profile/{id}', 'Auth\UserController@profile')->name('user.profile');
        Route::post('/changePassword', 'Auth\UserController@changePassword')->name('user.changePassword');
        Route::post('/user-role/update/{id}', 'Auth\UserController@roleUpdate')->name('user.role.update');
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
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

});

Route::namespace ('\App\Http\Controllers\GeneralSettings')->group(function () {
    Route::prefix('vehicle_type')->group(function () {
        Route::get('/', 'VehicleTypeController@index')->name('vehicle_type.index');
        Route::post('/store', 'VehicleTypeController@store')->name('vehicle_type.store');
        Route::post('/update/{id}', 'VehicleTypeController@update')->name('vehicle_type.update');
        Route::get('/delete/{id}', 'VehicleTypeController@destroy')->name('vehicle_type.destroy');
    });

    Route::prefix('delivery_status')->group(function () {
        Route::get('/', 'DeliveryStatusController@index')->name('delivery_status.index');
        Route::post('/store', 'DeliveryStatusController@store')->name('delivery_status.store');
        Route::post('/update/{id}', 'DeliveryStatusController@update')->name('delivery_status.update');
        Route::get('/delete/{id}', 'DeliveryStatusController@destroy')->name('delivery_status.destroy');
    });
});

//banner
Route::resource('banners', BannerController::class);

//role
Route::resource('roles', RoleController::class);

Route::resource('subscription_type', '\App\Http\Controllers\GeneralSettings\SubscriptionTypeController');
