<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    protected $table = 'vendor';
	 protected $fillable  = ['name', 'username', 'password', 'mobile_no', 'firm_name', 'email', 'land_line_no', 'address', 'landmark', 'photo', 'deleted_at', 'created_at', 'updated_at'];
	
	public function VendorZones()
     {
        return $this->hasMany('App\vendor_zone');
     }
	 public function VendorCategories()
     {
        return $this->hasMany('App\vendor_category');
     }
	 public function zone()
	 {
		return $this->belongsTo('App\zone');
	 }
	  public function category()
	 {
		return $this->belongsTo('App\category');
	 }
	  public function vendor()
	 {
		return $this->belongsTo('App\vendor');
	 }
	 public function userEnquiries()
	 {
		return $this->belongsTo('App\user_enquiry');
	 }
}
