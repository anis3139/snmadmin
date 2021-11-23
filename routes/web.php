<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/login', '\App\Http\Controllers\Admin\Auth\LoginController@login')->name('admin.login')->middleware('admin.guest');
Route::post('admin/onLogin', '\App\Http\Controllers\Admin\Auth\LoginController@onLogin')->name('admin.onLogin')->middleware('admin.guest');

Route::namespace ('\App\Http\Controllers\Admin')->middleware(['admin.auth'])->group(function () {

    //Home Page
    Route::get('/', 'HomeController@index')->name('home');
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
        Route::get('/list', 'Auth\AdminController@index')->name('admin.index');
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
        Route::get('/list', 'Blog\CategoryController@index')->name('category.index');
        Route::get('/create', 'Blog\CategoryController@create')->name('category.create');
        Route::post('/create', 'Blog\CategoryController@store')->name('category.store');
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

    Route::prefix('news')->group(function () {
        Route::get('/list', 'Blog\NewsController@index')->name('news.index');
        Route::get('/create', 'Blog\NewsController@create')->name('news.create');
        Route::post('/create', 'Blog\NewsController@store')->name('news.store');
        Route::get('/view/{id}', 'Blog\NewsController@view')->name('news.view');
        Route::get('/edit/{id}', 'Blog\NewsController@edit')->name('news.edit');
        Route::post('/edit/{id}', 'Blog\NewsController@update')->name('news.update');
        Route::delete('/delete/{id}', 'Blog\NewsController@destroy')->name('news.delete');
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
    Route::resource('user', 'UserController');

    Route::post('admin/logout', 'Auth\LoginController@onLogout')->name('admin.logout');
});
