<?php

use App\Http\Controllers\DrivoUserController;
use App\Http\Controllers\UserTypeController;
use App\Models\drivo_user;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

 Route::get('/users/{id}',function($id)
 {return drivo_user::with('user_type')->find($id);
 });
 // Route::post('/users', [DrivoUserController::class,'store']);
});            

