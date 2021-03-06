<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// implements MustVerifyEmail

class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','registered_as',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';

    public function orderService(){
        return $this->hasMany('App\Order');
    }
    public function orderProducts() {
        return $this->hasMany('App\ProductOrder');
    }

    public function searches() {
        return $this->hasMany('App\SearchHistory');
    }
    public function addService(){
        return $this->hasMany('App\Service');
    }
    public function addProducts() {
        return $this->hasMany('App\Product');
    }
    public function products() {
        return $this->hasMany('App\Products');
    }
    public function orders() {
        return $this->hasMany('App\ProductOrder');
    }

    public function addServiceCat(){
        return $this->hasMany('App\ServiceCategory');
    }

}
