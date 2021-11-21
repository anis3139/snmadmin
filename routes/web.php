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

Route::namespace('\App\Http\Controllers\Admin')->group(function () {
    //manage user
	 Route::prefix('common')->group(function () {
        Route::get('/delete', 'CommonController@destroy')->name('common.destroy');
		Route::get('/print', 'CommonController@prints')->name('common.print');
		Route::get('/export', 'CommonController@export')->name('common.export');
		Route::post('/import','CommonController@import')->name('common.import');		
		Route::get('/samplefiledownload','CommonController@sampleFileDownload')->name('common.samplefiledownload');
			
    });
	
	
    Route::prefix('user')->group(function () {
        Route::get('/', 'Auth\UserController@index')->name('user.index');
        Route::get('/create', 'Auth\UserController@create')->name('user.create');
        Route::post('/store', 'Auth\UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'Auth\UserController@edit')->name('user.edit');
        Route::get('/show/{id}', 'Auth\UserController@show')->name('user.show');
        Route::post('/update/{id}', 'Auth\UserController@update')->name('user.update');
        Route::get('/delete/{id}', 'Auth\UserController@destroy')->name('user.destroy');
    });
	
	
	Route::prefix('partner')->group(function () {
        Route::get('/', 'PartnerController@index')->name('partner.index');
        Route::get('/create', 'PartnerController@create')->name('partner.create');
        Route::post('/store', 'PartnerController@store')->name('partner.store');
        Route::get('/edit/{id}', 'PartnerController@edit')->name('partner.edit');
        Route::get('/show/{id}', 'PartnerController@show')->name('partner.show');
        Route::post('/update/{id}', 'PartnerController@update')->name('partner.update');
        Route::get('/delete/{id}', 'PartnerController@destroy')->name('partner.destroy');
    });
		

	//manage user
    Route::prefix('delivery')->group(function () {
        Route::get('/orders', 'DeliveryController@index')->name('delivery.orders');
		Route::get('/orders/tracking', 'DeliveryController@tracking')->name('delivery.tracking');
    });

	//manage user
    Route::prefix('fleet')->group(function () {
        Route::get('/index', 'FleetController@index')->name('fleet.index');
		Route::get('/create', 'FleetController@create')->name('fleet.create');
    });

    //Complaints
    Route::prefix('complaint')->group(function () {
        Route::get('/list', 'ComplaintsController@index')->name('complaint.view');

    });

    //manage setting
    Route::prefix('setting')->group(function () {
        Route::get('/list', 'SettingController@index')->name('setting.index');
        Route::get('/create', 'SettingController@create')->name('setting.create');
        Route::post('/store', 'SettingController@store')->name('setting.store');
        Route::post('/update/{id}', 'SettingController@update')->name('setting.update');
    });
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    //driver
    Route::resource('driver','DriverController');
    //Route::resource('partner','PartnerController');

});

Route::namespace('\App\Http\Controllers\GeneralSettings')->group(function () {
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
/*Route::get('/user', function(){
    return view('index');
});*/

//banner
Route::resource('banners', BannerController::class);

//role
Route::resource('roles', RoleController::class);

//role
Route::resource('promo-code', PromoCodeController::class);

//general settings
Route::resource('user_type','\App\Http\Controllers\GeneralSettings\UserTypeController');
//Route::resource('vehicle_type','\App\Http\Controllers\GeneralSettings\VehicleTypeController');
Route::resource('general_status','\App\Http\Controllers\GeneralSettings\GeneralStatusController');
//Route::resource('delivery_status','\App\Http\Controllers\GeneralSettings\DeliveryStatusController');
Route::resource('subscription_type','\App\Http\Controllers\GeneralSettings\SubscriptionTypeController');
