<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login', '\App\Http\Controllers\Admin\Auth\LoginController@login')->name('admin.login')->middleware('admin.guest');
Route::post('admin/onLogin', '\App\Http\Controllers\Admin\Auth\LoginController@onLogin')->name('admin.onLogin')->middleware('admin.guest');

Route::namespace ('\App\Http\Controllers\Admin')->middleware(['admin.auth'])->group(function () {
    //Home Page
    Route::get('/dashboard', 'HomeController@index')->name('home');
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
        Route::resource('admin', 'Auth\AdminController')->except('update');
        Route::post('/admin/{admin}', 'Auth\AdminController@update')->name('admin.update');
        Route::get('/admin/{admin}', 'Auth\AdminController@show')->name('admin.show');

        Route::get('/profile/{id}', 'Auth\AdminController@profile')->name('admin.profile');
        Route::post('/changePassword', 'Auth\AdminController@changePassword')->name('admin.changePassword');
        Route::post('/admin-role/update/{id}', 'Auth\AdminController@roleUpdate')->name('admin.role.update');
        //Visitor Table
        Route::get('/visitor', 'VisitorController@VisitorIndex')->name('admin.VisitorIndex');
        Route::resource('user', 'UserController');

    });

    Route::prefix('category')->group(function () {
        Route::get('/list', 'Blog\CategoryController@index')->name('category.index');
        Route::get('/create', 'Blog\CategoryController@create')->name('category.create');
        Route::post('/create', 'Blog\CategoryController@store')->name('category.store');
        Route::get('/show/{id}', 'Blog\CategoryController@show')->name('category.show');
        Route::get('/edit/{id}', 'Blog\CategoryController@edit')->name('category.edit');
        Route::post('/edit/{id}', 'Blog\CategoryController@update')->name('category.update');
        Route::delete('/delete/{id}', 'Blog\CategoryController@destroy')->name('category.delete');
    });
    Route::prefix('sub-category')->group(function () {
        Route::get('/list', 'Blog\SubCategoryController@index')->name('subcategory.index');
        Route::get('/create', 'Blog\SubCategoryController@create')->name('subcategory.create');
        Route::post('/create', 'Blog\SubCategoryController@store')->name('subcategory.store');
        Route::get('/edit/{id}', 'Blog\SubCategoryController@edit')->name('subcategory.edit');
        Route::post('/edit/{id}', 'Blog\SubCategoryController@update')->name('subcategory.update');
        Route::delete('/delete/{id}', 'Blog\SubCategoryController@destroy')->name('subcategory.delete');

        //for catch subcategory image
        Route::get('/subcategory/list', 'Blog\SubCategoryController@ajaxGetData')->name('subcategory.ajaxdata');
    });

    Route::prefix('tag')->group(function () {
        Route::get('/list', 'Blog\TagController@index')->name('tag.index');
        Route::get('/create', 'Blog\TagController@create')->name('tag.create');
        Route::post('/create', 'Blog\TagController@store')->name('tag.store');
        Route::get('/edit/{id}', 'Blog\TagController@edit')->name('tag.edit');
        Route::post('/edit/{id}', 'Blog\TagController@update')->name('tag.update');
        Route::delete('/delete/{id}', 'Blog\TagController@destroy')->name('tag.delete');
    });

    //manage comment
    Route::prefix('comment')->group(function () {
        Route::get('comment', 'Blog\CommentController@index')->name('comment.list');
        Route::get('approve/approve-list', 'Blog\CommentController@approveList')->name('comment.approve.list');
        Route::get('pending/pending-list', 'Blog\CommentController@pendingList')->name('comment.pending.list');
        Route::get('pending/list/approve/{id}', 'Blog\CommentController@pendingListApprove')->name('comment.pending.list.approve');
        Route::delete('delete/{id}', 'Blog\CommentController@destroy')->name('comment.destroy');
    });

    //filter data
    Route::prefix('filter')->group(function () {
        Route::get('/list', 'Blog\FilterController@index')->name('filter.view');
        Route::get('/list/data', 'Blog\FilterController@filter')->name('filter.list');
        Route::get('/subcategory/list', 'Blog\FilterController@ajaxGetSubcategoryData')->name('filter.getsubcategory');

    });

    Route::prefix('blog')->group(function () {
        Route::get('/list', 'Blog\BlogController@index')->name('blog.index');
        Route::get('/create', 'Blog\BlogController@create')->name('blog.create');
        Route::post('/create', 'Blog\BlogController@store')->name('blog.store');
        Route::get('/view/{id}', 'Blog\BlogController@view')->name('blog.view');
        Route::get('/edit/{id}', 'Blog\BlogController@edit')->name('blog.edit');
        Route::post('/edit/{id}', 'Blog\BlogController@update')->name('blog.update');
        Route::delete('/delete/{id}', 'Blog\BlogController@destroy')->name('blog.delete');
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


Route::namespace ('\App\Http\Controllers\Frontend')->group(function () {
    Route::get('/', 'HomeController@index')->name('client.home');
    Route::get('/login', 'Auth\LoginController@index')->name('client.loginProcess')->middleware('guest');
    Route::get('/register', 'Auth\LoginController@create')->name('client.register')->middleware('guest');
    Route::post('/register', 'Auth\LoginController@store')->name('client.regitration')->middleware('guest');
    Route::get('/send-otp', 'Auth\LoginController@sendOtp')->name('client.sendOtp')->middleware('guest');
    Route::post('/login', 'Auth\LoginController@login')->name('client.login')->middleware('guest');
    Route::prefix('user')->middleware('auth')->group(function () {
        Route::get('dashboard', 'User\UserController@index')->name('client.dashboard');
    });
});
