<?php

namespace App\Http\Controllers;

use App\Models\drivo_user;
use App\Models\User;
use App\Models\user_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DrivoUserController extends Controller
{
    public function register( Request $request)
    {
 $request->validate([
'user_name'=>'required|string|max:255',
'user_email'=>'required|email|unique:drivo_users,user_email',
'distircts_id'=> 'required|exists:distircts,id' ,
'user_password'=>'required|string|min:8',
'user_phone'=>['required',function($attribute,$value,$fail){
   if(!in_array(substr($value,0,2),['73','77','70','71'])){
      $fail('the number must begin 70,71,77,73');
   }
}],

 'user_type_id'=>'required|exists:user_types,id',
 
 ]);
 //$hashedPassword=bcrypt($request->user_password);
 $user=drivo_user::create([
   'user_name'=>$request->user_name,
'user_email'=>$request->user_email,
'distircts_id'=> $request->distircts_id,
'user_password'=>$request->user_password,
'user_phone'=>$request->user_phone,
 'user_type_id'=>$request->user_type_id,
 'user_password'=>$request->user_password,
 
 ]);
 $user=drivo_user::with('distirct.governorate')->find($user->id);

 return response()->json(['message'=>'done','user'=>$user],201);


    }
    public function login(Request $request)
    {
      $request->validate([
          
        'user_email'=>'required|string|email',
        'user_password'=>'required|string']);
        if(Auth::attempt($request->only('user_email','user_password')))
        return response()->json (['message'=>"login done ",201]);
        if(!Auth::attempt($request->only('user_email','user_password')))
        return response()->json (['message'=>"invalid email or user",401]);
        $user=drivo_user::where('user_email',$request->user_email)->FirstOrFail();
        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json(['message'=>'login done','user'=>$user,'Token'=>$token],201);
      
    }
}


