<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';


    public function productCategory(){
        return $this->belongsTo('App\ProductCategory');
    }

    public function productSubCategory() {
    	return $this->belongsTo('App\ProductSubCategory');
    }

    public function unit() {
    	return $this->hasOne('App\Unit');
    }
}
