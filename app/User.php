<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
     public function UserIdentities()
     {
         return $this->hasMany('App\user_identity');
     }
	 
	  protected $table = 'user_identity';
}
