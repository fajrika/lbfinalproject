<?php

use Illuminate\Support\Facades\Route;
Route::get('/test',function(){
    dump(\App\Models\Supplier::query());
    dump(\App\Models\Supplier::all()->toArray());
    dump(datatables()->of(
            \App\Models\Supplier::query()
        )->toJson());
    dump(datatables()->of(\App\Models\Supplier::query())->make(true));

    dump(\App\Models\Item::leftJoin('categories','categories.id','=','items.category_id'));
    dump(
        datatables()->of(
            \App\Models\Item::leftJoin('categories','categories.id','=','items.category_id')
        )->toJson()
    );
    
});


Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('/',function(){return redirect()->route('login');});

    Route::post('/login', 'AuthController@process')->name('login.process');
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::get('/login', 'AuthController@index')->name('login');
    
    Route::middleware(['authCustom'])->group(function () {
        Route::get('/dashboard', 'DashboardController');
        Route::resource('/profile', 'ProfileController')->parameters(['profile' => 'user']);
    });
    
    Route::middleware(['authCustom:Admin'])->group(function () {
        Route::resource('/userManagement', 'UserManagementController')->parameters(['userManagement' => 'user']);
    });
    
    Route::middleware(['authCustom:Warehouse'])->group(function () {
        Route::resource('/item', 'ItemController');
        Route::resource('/customer', 'CustomerController');
        Route::resource('/supplier', 'SupplierController');
        Route::resource('/category', 'CategoryController');
        Route::resource('/incomingItem', 'IncomingItemController');
        Route::resource('/outcomingItem', 'OutcomingItemController');
        // Route::resource('/itemFlow', 'ItemFlowController');
    });

});