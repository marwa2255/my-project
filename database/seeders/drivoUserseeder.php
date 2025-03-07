<?php

namespace Database\Seeders;

use App\Models\drivo_user;
use App\Models\User;
use App\Models\user_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class drivoUserseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user_type=user_type::create(['user_type'=>'admin']);
       drivo_user::create([
        'user_name'=>'marwa',
        'user_email'=>'marwa@gmail.com',
        'distircts_id'=>'1',
        'user_password'=>'52232',
        'user_phone'=>'526232',
        'user_type_id'=>$user_type->id
       ]);
   
    }
}
