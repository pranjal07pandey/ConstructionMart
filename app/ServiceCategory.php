<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table = 'service_categories';

    public function service(){
        return $this->belongsTo('App\Service');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


}
