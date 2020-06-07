<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    protected $table = 'search_histories';

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
