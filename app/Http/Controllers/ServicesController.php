<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Service;
use Auth;
use Image;
use File;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at','desc')->paginate(10);
        return view('services.index')->with('services',$services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
            'description'=>'required',
            'cover_image'=>'image|nullable'
        ]);

        //handle file upload

        if($request->hasFile('cover_image')){

            $file = $request->file('cover_image');
            // dd($file);
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $img = Image::make($request->file('cover_image'))->resize(500, 500)->save('uploads/services/'.$filename, 60);

            //get file name with the extension
            // $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            // //get just filename
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // //get just extension
            // $extension = $request->file('cover_image')->getClientOriginalExtension();

            // ///filename to store
            // $fileNameToStore = $filename.'_'.time().'.'.$extension;

         

            // $tmp = Image::make($request->file('cover_image'))->resize(300, 300);

            
               //upload image
            // $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);


        }else{
            // $fileNameToStore = 'noimage.jpg';
            $filename = 'noimage.jpg';
        }

        $service = new Service;
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->cover_image = $filename;
        Auth::user()->addService()->save($service);
        // $service->save();
        return redirect('/services')->with('success', 'Service Added');


        
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
        return view('services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service =  Service::find($id);
        return view('services.edit')->with('service', $service);
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
            'description'=>'required'
        ]);

        if($request->hasFile('cover_image')){
            
            $file = $request->file('cover_image');
            // dd($file);
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $img = Image::make($request->file('cover_image'))->resize(500, 500)->save('uploads/services/'.$filename, 60);

        }

        $service = Service::find($id);
        $service->title = $request->input('title');
        $service->description = $request->input('description');

        if($request->hasFile('cover_image')){
            $service->cover_image = $filename;
        }

        Auth::user()->addService()->save($service);

        return redirect('/services')->with('success', 'Service Edited');


        // return redirect('/service-manager-index')->with('success', 'Service Edited');


        // $this->validate($request,[
        //     'title' => 'required',
        //     'description'=>'required'
        // ]);

        // if($request->hasFile('cover_image')){
      
        //     $file = $request->file('cover_image');
        //     // dd($file);
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time(). '.' .$extension;
        //     $img = Image::make($request->file('cover_image'))->resize(500, 500)->save('uploads/services/'.$filename, 60);
        // }
 
        // $service = Service::find($id);
        // $service->title = $request->input('title');
        // $service->description = $request->input('description');

        // if($request->hasFile('cover_image')){
        //     $service->cover_image = $filename;
        // }

        // Auth::user()->addService()->save($service);


        // return redirect('/services')->with('success', 'Service Edited');

        
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
            File::delete('uploads/services/'.$service->cover_image);

        }

        // Auth::user()->addService()->delete($service);
        $service->delete();


        return redirect('/services')->with('success', 'Service Deleted');
        
    }
}
