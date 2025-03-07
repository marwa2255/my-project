<?php

use App\Http\Controllers\DrivoUserController;
use App\Http\Controllers\Usercontroller;
use App\Models\drivo_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/users/{id}',function($id)
{return User::with('user_type')->find($id);
});
Route::post('/register',[Usercontroller::class,'register']);
Route::post('/login',[Usercontroller::class,'login']);
Route::get('/user/{id}', function($id) {
    return User::with('distirct.governorate')->find($id);
});
