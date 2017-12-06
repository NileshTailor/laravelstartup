<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendor_zone extends Model
{
		protected $table = 'vendor_zone';
		protected $fillable  = ['vendor_id', 'zone_id', 'created_at', 'updated_at'];
		public function vendor()
		{
			return $this->belongsTo('App\vendor');
		}
}
