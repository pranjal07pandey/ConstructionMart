<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    protected $table = 'product_sub_categories';

    public function products() {
        return $this->hasMany('App\Product');
    }

    public function category() {
    	return $this->belongsTo('App\ProductCategory');
    }
}
