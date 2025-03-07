<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class drivo_user extends Authenticatable
{//use App\Models\HasApiTokens,HasFactory,Notifiable;
    protected $guarded = [];

    protected $table = 'drivo_users';

    
    
    
    
    
    public function getEmailForAuthentication()
    {
        return $this->user_email;
    }
    public function getAuthPassword()
    {
        return $this->user_password; 
    }





   
    
    public function user_type()
    {
        return $this ->belongsTo(user_type::class);
    }
    public function distirct()
    {
        return $this->belongsTo(distirct::class, 'distircts_id');
    }
    
    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'gover_id'); 
    }

   

}