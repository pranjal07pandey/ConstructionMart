<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderProduct;
use App\ProductOrder;
use Auth;
use Carbon\Carbon;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodData = Product::paginate(4);
        return view('home.orderProduct', ['prodData' => $prodData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $orderData = new ProductOrder;

        $time = Carbon::now();
        $user_id = Auth::user()->id;
        // dd($request->product);
        if(Auth::user()){
            for($i = 0; $i<sizeof($request->id); $i++) {
                $orderData = array (
                    'product_id' => $request->id[$i],
                    'user_id' => $user_id,
                    'phone_number' => $request->phoneNumber,
                    'location' => $request->location,
                    'email' => $request->email,
                    'message' => $request->message,
                    'created_at' => $time,
                    'updated_at' => $time,
                );
                ProductOrder::insert($orderData);
                // Mail::to('pranjalpandey92@gmail.com')->send(new OrderProduct());

            }
        }
        return redirect()->back();

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
