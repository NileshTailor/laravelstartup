<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    protected $table = 'area';
	protected $fillable  = ['zone_id', 'name', 'created_at', 'updated_at', 'flag'];
    public function zone()
    {
        return $this->belongsTo('App\zone');
    }
}
