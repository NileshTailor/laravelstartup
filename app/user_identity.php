<?php

namespace App;
//namespace App\Models;
//use Eloquent;

use Illuminate\Database\Eloquent\Model;

class user_identity extends Model
{
  /*  protected $table = 'user_identities';
   public function User()
    {
        return $this->belongsTo('User');
    } */
	
	protected $table = 'user_identity';
	protected $fillable  = ['user_id', 'identity_proof_id', 'created_at', 'updated_at'];
    public function user()
    {
        return $this->belongsTo('App\user');
    }
	
	
	
	
}
