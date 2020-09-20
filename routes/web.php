<?php

use Illuminate\Support\Facades\Route;


Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('/',function(){
        return redirect('/login');
    });
    Route::post('/login', 'AuthController@process')->name('process');
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::middleware(['authCustom'])->group(function () {
        Route::get('/login', 'AuthController@index')->name('login');
        Route::get('/dashboard', 'DashboardController');
        Route::resource('/profile', 'ProfileController')->parameters(['profile' => 'user']);
        Route::resource('/userManagement', 'UserManagementController')->parameters(['userManagement' => 'user']);
        Route::resource('/item', 'ItemController');
        Route::resource('/itemFlow', 'ItemFlowController');
    });
});