<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_identity extends Model
{
   public function user()
    {
        return $this->hasMany('App\user');
    }
}
