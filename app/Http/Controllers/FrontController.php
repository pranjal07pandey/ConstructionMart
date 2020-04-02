<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('home.index');
    }
    
    public function contact(){
        return view('home.contact');
    }

    public function service(){
        return view('home.services');
    }

    public function serviceOrder(){
        return view('home.orderService');
    }
}
