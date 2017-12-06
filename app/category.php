<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
     protected $table = 'category';
	 protected $fillable  = ['name', 'created_at', 'updated_at'];

	  public function userEnquiries()
	 {
		return $this->belongsTo('App\user_enquiry');
	 }
}
