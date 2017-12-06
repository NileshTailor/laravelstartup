<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class user_enquiry extends Model
{
     protected $table = 'user_enquiry';
	 protected $fillable  = ['name', 'query', 'address', 'mobile_no', 'user_id', 'zone_id', 'category_id', 'vendor_id', 'status', 'deleted_at', 'created_at', 'updated_at'];
	 
	  public function vendor()
	 {
		return $this->belongsTo('App\vendor');
	 }
	  public function zone()				
	 {
		return $this->belongsTo('App\zone');
	 }
	  public function category()
	 {
		return $this->belongsTo('App\category');
	 }
	 
	 public function user_enquiry_followup()
     {
        return $this->hasMany('App\user_enquiry_followup');
     }
	 public function user()
     {
        return $this->belongsto('App\user');
     }
}
