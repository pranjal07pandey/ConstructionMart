<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\ServiceCategory;
use App\Order;
use App\User;
use Auth;

class OrderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'service'=>'reqiured',
        //     'user_id'=>'required',
        //     'name' => 'required',
        //     'phone'=> 'required',
        //     'email'=>'nullable|email',
        //     'location'=> 'required',
        //     'message'=>'required',
        // ]);

        $order = new Order;
        $order->service = $request->input('service');
        // $order->user_id = $request->input('user_id');
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->location = $request->input('location');
        $order->message = $request->input('message');

        Auth::user()->orderService()->save($order);
        // $order->save();
        return redirect('/home')->with('success', 'order palced');






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function order($id){
        // $users = User::find($id);
        $category =  ServiceCategory::find($id);
        return view('home.orderService')->with('category', $category);
    }
}
