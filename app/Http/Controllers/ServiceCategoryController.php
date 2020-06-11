<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceCategory;
use App\Service;
use Auth;
use Image;
use File;


class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = ServiceCategory::orderBy('created_at','desc')->paginate(10);
        return view('services.category.index')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('services.category.create')->with('services',$services);

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
        Auth::user()->addServiceCat()->save($category);
        
        return redirect('/services')->with('success', 'category Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category =  ServiceCategory::find($id);
        return view('services.category.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =  ServiceCategory::find($id);
        return view('services.category.edit')->with('category', $category);
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
        
        return redirect('/services')->with('success', 'category Updated');
        
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

        if($category->cover_image !='noimage.jpg'){
            //delete Image
            File::delete('uploads/services/'.$category->cover_image);

        }

        // Auth::user()->addService()->delete($service);
        $category->delete();
        return redirect('/services')->with('success', 'category Deleted');
    }
}
