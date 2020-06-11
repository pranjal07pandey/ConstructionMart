<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Service;
use App\ServiceCategory;
use App\User;
use Auth;
use File;

class ServiceManagerCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $category = Auth::user()->addServiceCat;
        return view('admin.service-manager.service-categories.index')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Auth::user()->addService;
        return view('admin.service-manager.service-categories.create')->with('services',$services);

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
            'cat_title' => 'required',
            'service_id' =>'required',
            'descrition'=>'nullable',
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

        $category = new ServiceCategory;
        $category->cat_title = $request->input('cat_title');
        $category->service_id = $request->input('service_id');
        $category->description = $request->input('description');
        $category->cover_image = $filename;
        // $category->save();
        Auth::user()->addServiceCat()->save($category);
        return redirect('/service-manager-index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = ServiceCategory::find($id);
        return view('admin.service-manager.service-categories.show')->with('category',$category);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ServiceCategory::find($id);
        return view('admin.service-manager.service-categories.edit')->with('category',$category);
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
            'cat_title' => 'required',
            'service_id' =>'required',
            'descrition'=>'nullable',
            'cover_image'=>'image|nullable'

        ]);

        //handle file upload

        if($request->hasFile('cover_image')){
           
            $file = $request->file('cover_image');
            // dd($file);
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $img = Image::make($request->file('cover_image'))->resize(500, 500)->save('uploads/services/'.$filename, 60);

        
        }

        $category = ServiceCategory::find($id);
        $category->cat_title = $request->input('cat_title');
        $category->service_id = $request->input('service_id');
        $category->description = $request->input('description');

        if($request->hasFile('cover_image')){
            $category->cover_image = $filename;
        }
    
        Auth::user()->addServiceCat()->save($category);
        
        return redirect('/service-manager-index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ServiceCategory::find($id);
        $category->delete();
        return redirect('/service-manager-index')->with('success', 'Service Deleted');
    }
}
