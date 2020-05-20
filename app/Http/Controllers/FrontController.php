<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use App\ProductSubCategory;

class FrontController extends Controller
{
    public function index(){
         $cat = ProductCategory::get();
        return view('home.index', ['data' => $cat]);
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
