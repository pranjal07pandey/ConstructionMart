<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    public function serviceCategories(){
        return $this->hasMany('App\ServiceCategory');
    }


}
