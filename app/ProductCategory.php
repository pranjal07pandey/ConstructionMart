<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function productSubCategory(){
        return $this->hasMany('App\ProductCategory');
    }
}
