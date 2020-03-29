<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceSubCategory extends Model
{
    protected $table = 'service_sub_categories';

    public function serviceCategory(){
        return $this->belongsTo('App\ServiceCategory');
    }
}
