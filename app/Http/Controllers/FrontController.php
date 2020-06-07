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
         $products = Product::paginate(8);
        return view('home.index', ['data' => $cat, 'products' => $products]);
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
