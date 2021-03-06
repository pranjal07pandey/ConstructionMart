<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Service;
use Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $orders = Auth::user()->orderservice;
        $prodOrder = Auth::user()->orderProducts;
        // dd($prodOrder);
        return view('/home', ['orders' => $orders, 'prodOrder' => $prodOrder]);
    }

    // public function viewprofile($id)

    // {
    //     $orders = Auth::user($id)->orderservice;
    //     return view('userprofile')->with('orders', $orders);
    // }

    
}
