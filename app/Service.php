<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    public function serviceCategory(){
        return $this->hasMany('App\Service');
    }
}
