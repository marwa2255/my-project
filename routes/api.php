<?php

use App\Http\Controllers\DrivoUserController;
use App\Models\drivo_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/users/{id}',function($id)
{return drivo_user::with('user_type')->find($id);
});
Route::post('/register',[DrivoUserController::class,'register']);
Route::post('/login',[DrivoUserController::class,'login']);
Route::get('/user/{id}', function($id) {
    return drivo_user::with('distirct.governorate')->find($id);
});
