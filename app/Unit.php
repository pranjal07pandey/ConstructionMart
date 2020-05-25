<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';

    public function product() {
    	return $this->belongsTo('App\Product');
    }
}
