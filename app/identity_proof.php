<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class identity_proof extends Model
{
   public function user()
    {
        return $this->belongsTo('App\IdentityProof');
    }
}
