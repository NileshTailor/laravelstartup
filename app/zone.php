<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class zone extends Model
{
     protected $table = 'zone';
	 protected $fillable  = ['name', 'created_at', 'updated_at'];
	 public function area()
     {
        return $this->hasMany('App\area');
     }
	  public function userEnquiries()
	 {
		return $this->belongsTo('App\user_enquiry');
	 }
}