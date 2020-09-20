<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('userManagement','api\UserManagementAPI@__invoke');
    Route::get('item','api\ItemAPI@__invoke');
    Route::get('customer','api\CustomerAPI@__invoke');
    Route::get('supplier','api\SupplierAPI@__invoke');
    Route::get('category','api\CategoryAPI@__invoke');
    Route::get('incomingItem','api\IncomingItemAPI@__invoke');
    Route::get('outcomingItem','api\OutcomingItemAPI@__invoke');
    // Route::get('itemFlow','api\ItemFlowAPI');
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
