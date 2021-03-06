<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceCategory;

class UserServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $services = Service::orderBy('created_at','desc')->paginate(4);

        return view('home.userServices')->with('services',$services);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service =  Service::find($id);
        return view('home.showUserServices')->with('service', $service);
    }


    public function allServices(){
        $services = Service::all();
        return view('home.viewAllServices')->with('services', $services);
    }

}
