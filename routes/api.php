<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('userManagement','api\UserManagementAPI');
    Route::get('item','api\ItemAPI');
    Route::get('itemFlow','api\ItemFlowAPI');
    Route::get('customer','api\CustomerAPI');
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
