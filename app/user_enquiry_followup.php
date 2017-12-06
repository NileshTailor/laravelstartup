<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_enquiry_followup extends Model
{
     protected $table = 'user_enquiry_followup';
	 protected $fillable  = ['user_enquiry_id', 'user_id', 'vendor_id', 'comment', 'comment_by', 'deleted_at', 'created_at', 'updated_at'];
	
	public function user_enquiry()
     {
        return $this->belongsto('App\user_enquiry');
     }
	 public function user()
     {
        return $this->belongsto('App\user');
     }
	 public function vendor()
     {
        return $this->belongsto('App\vendor');
     }
	
}
