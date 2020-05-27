<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $table = 'product_orders';

    public function product() {
    	return $this->belongsTo('App\Product');
    }
}
