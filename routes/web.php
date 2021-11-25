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
        Route::resource('user', 'UserController', ['names' => 'admin.user'])->except('update');
        Route::post('user/update/{user}', 'UserController@update')->name('admin.user.update');

    });

        /**
         * Blog Route Start
         */
        Route::resource('blog', 'Blog\BlogController', ['names' => 'blog']);
        Route::get('/view/{blog}', 'Blog\BlogController@view')->name('blog.view');

        Route::resource('/category', 'Blog\CategoryController');
        Route::get('/category/{category}', 'Blog\CategoryController@show')->name('category.show');

        Route::resource('subcategory' , 'Blog\SubCategoryController');
        Route::get('/subcategory/list', 'Blog\SubCategoryController@ajaxGetData')->name('subcategory.ajaxdata');

        Route::resource('/tag', 'Blog\TagController');



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


          /**
         * Blog Route Start
         */

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
