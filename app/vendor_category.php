<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendor_category extends Model
{
    	protected $table = 'vendor_category';
	protected $fillable  = ['vendor_id', 'category_id', 'created_at', 'updated_at'];
    public function vendor()
    {
        return $this->belongsTo('App\vendor');
    }
}
