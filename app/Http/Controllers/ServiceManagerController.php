<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Service;
use App\User;
use Auth;

class ServiceManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $services = Auth::user()->addService;
        return view('admin.service-manager.services.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service-manager.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description'=>'nullable',
            'cover_image'=>'image|nullable|max:1999'
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

        $service = new Service;
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->cover_image = $fileNameToStore;
        Auth::user()->addService()->save($service);
        // $service->save();
        return redirect('/service-manager-index')->with('success', 'Service Added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('admin.service-manager.services.show')->with('service',$service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service-manager.services.edit')->with('service',$service);
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
        $this->validate($request,[
            'title' => 'required',
            'description'=>'nullable'
        ]);

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

        }

        $service = Service::find($id);
        $service->title = $request->input('title');
        $service->description = $request->input('description');

        if($request->hasFile('cover_image')){
            $service->cover_image = $fileNameToStore;
        }

        Auth::user()->addService()->save($service);


        return redirect('/service-manager-index')->with('success', 'Service Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        if($service->cover_image !='noimage.jpg'){
            //delete Image
            Storage::delete('public/cover_images/'.$service->cover_image);

        }
        // Auth::user()->addService()->delete($service);
        $service->delete();
        return redirect('/service-manager-index')->with('success', 'Service Deleted');
    }
}
