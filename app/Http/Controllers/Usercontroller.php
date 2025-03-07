<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends Controller
{
    public function register(Request $request) {
     
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', 
            'distircts_id' => '|exists:distircts,id', 
            'password' => 'required|string|min:8',
            'user_phone' => ['required', function($attribute, $value, $fail) {
                if (!in_array(substr($value, 0, 2), ['73', '77', '70', '71'])) {
                    $fail('the number must begin 70,71,77,73');
                }
            }],
            'user_type_id' => 'required|exists:user_types,id',
        ]);
  
       
        $hashedPassword = bcrypt($request->password);
  
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'distircts_id' => $request->districts_id,  
            'password' => $hashedPassword,
            'user_phone' => $request->user_phone,
            'user_type_id' => $request->user_type_id,
        ]);
  
        
        $user = User::with('distirct.governorate')->find($user->id);
  
     
        return response()->json(['message' => 'done', 'user' => $user], 201);
    }
    public function login(Request $request)
    {
      $request->validate([
          
        'email'=>'required|string|email',
        'user_password'=>'required|string']);
        if(Auth::attempt($request->only('email','user_password')))
        return response()->json (['message'=>"login done ",201]);
        if(!Auth::attempt($request->only('email','user_password')))
        return response()->json (['message'=>"invalid email or user",401]);
        $user=User::where('email',$request->user_email)->FirstOrFail();
        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json(['message'=>'login done','user'=>$user,'Token'=>$token],201);
      
    }
    
   
}

