<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_type extends Model
{
    public function User()
    {
        return $this ->hasmany(drivo_user::class);
    }
}

