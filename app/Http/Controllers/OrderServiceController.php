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
            //get file name with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            ///filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        $order = new Order;
        $order->service = $request->input('service');
        // $order->user_id = $request->input('user_id');
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->location = $request->input('location');
        $order->message = $request->input('message');
        $order->cover_image = $fileNameToStore;

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
