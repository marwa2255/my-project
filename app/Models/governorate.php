<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class governorate extends Model
{
    public function districts()
    {
        return $this->hasMany(distirct::class,'gover_id');
    }
}
