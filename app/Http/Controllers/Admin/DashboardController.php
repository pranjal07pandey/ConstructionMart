<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use Auth;



class DashboardController extends Controller
{

    public function index(){
        $orders = Order::orderBy('created_at','desc')->paginate(7);
        return view('admin.dashboard')->with('orders', $orders);

    }

    public function orderDetails($id){
        $orders = Order::find($id);
        return view('admin.orderDetails')->with('orders', $orders);
    }

    public function checkDelivered(Request $request, $id){
        $orders = Order::find($id);
        $orders->delivered = $request->input('delivered');

        $orders->update();

        return redirect('/dashboard');
    }

    public function registered(){

        $users = User::all();
        return view('admin.registeredUser')->with('users', $users);
    }

    public function registerEdit($id){

        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users', $users);


    }

    public function registerUpdate(Request $request, $id){

        $users = User::find($id);
        $users->name = $request->input('name');
        $users->usertype = $request->input('usertype');

        $users->update();

        return redirect('/role-register')->with('status', 'role updated');

    }

    public function registerDelete($id){

        $users = User::find($id);
        $users->delete();

        return redirect('/role-register')->with('status', 'user deleted');


    }

    
    //Service manager
    public function smDashboard(){
        $orders = Auth::user('created_at','desc')->orderservice;
        // $orders = Order::orderBy('created_at','desc')->paginate(7);
        return view('admin.service-manager.smDashboard')->with('orders', $orders);

    }
}
