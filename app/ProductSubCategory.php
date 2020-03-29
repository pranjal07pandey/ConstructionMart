<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    protected $table = 'product_sub_categories';

    public function productCategory(){
        return $this->belongsTo('App\ProductCategory');
    }
}
