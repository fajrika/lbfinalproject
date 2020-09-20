<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('userManagement','api\UserManagementAPI@__invoke');
    Route::get('item','api\ItemAPI');
    Route::get('customer','api\CustomerAPI');
    Route::get('supplier','api\SupplierAPI');
    Route::get('category','api\CategoryAPI');
    Route::get('incomingItem','api\IncomingItemAPI');
    Route::get('outcomingItem','api\OutcomingItemAPI');
    // Route::get('itemFlow','api\ItemFlowAPI');
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
