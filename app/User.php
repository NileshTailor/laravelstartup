<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user extends Model
{    //protected $table = 'identity_proof';
	 //use Notifiable;
	 //protected $timestamps = true;
     protected $table = 'user';
	 protected $fillable  = ['name', 'username', 'password', 'dob', 'mobile_no', 'spouse_name', 'spouse_mobile_no', 'email', 'land_line_no', 'father_name', 'address', 'landmark', 'hobby', 'emergancy_contact_detail', 'annual_income', 'use_smart_phone', 'zone_id', 'area_id', 'identity_proof_id', 'photo', 'deleted_at', 'created_at', 'updated_at'];
	
	public function UserIdentities()
     {
        return $this->hasMany('App\user_identity');
     }
	 public function IdentityProofs()
	 {
		return $this->belongsTo('App\identity_proof');
	 }
	 public function vendors()
	 {
		return $this->belongsTo('App\vendor');
	 }
	  public function zones()
	 {
		return $this->belongsTo('App\zone');
	 }
	  public function areas()
	 {
		return $this->belongsTo('App\area');
	 }
	 protected $hidden = [
        'password', 'remember_token',
    ];
}

