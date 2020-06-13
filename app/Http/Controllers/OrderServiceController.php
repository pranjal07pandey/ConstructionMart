<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderService;
use Illuminate\Http\Request;
use App\Service;
use App\ServiceCategory;
use App\Order;
use App\User;
use Auth;
use Image;

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
        
        $data = request()->validate([
            'service' =>'required',
            'name' =>'required',
            'phone' =>'required',
            'email'=> 'nullable|email',
            'location' =>'required',
            'message' => 'nullable',
            'cover_image'=>'image|nullable'
        ]);

         //handle file upload

         if($request->hasFile('cover_image')){
            
            $file = $request->file('cover_image');
            // dd($file);
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $img = Image::make($request->file('cover_image'))->resize(500, 500)->save('uploads/services/'.$filename, 60);


        }else{
            $filename = 'noimage.jpg';
        }


        $order = new Order;
        $order->service = $request->input('service');
        // $order->user_id = $request->input('user_id');
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->location = $request->input('location');
        $order->message = $request->input('message');
        $order->cover_image = $filename;

        Auth::user()->orderService()->save($order);

        //uncomment to activate email send
        // Mail::to('pranjalpandey92@gmail.com')->send(new OrderService($data));

        return redirect('/home')->with('success', 'Order palced, we will contact you shortly');


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
        $services = Service::all();
        $category =  ServiceCategory::find($id);
        return view('home.orderService')->with('category', $category)->with('services', $services);
    }
}
