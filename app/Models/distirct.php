<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class distirct extends Model
{protected $table = 'distircts';
    public function drivo_user()
    {
        return $this->hasMany(drivo_user::class,'distircts_id');
    }
    public function governorate()
    {
        return $this->belongsTo(governorate::class,'gover_id');
    }

   
}
