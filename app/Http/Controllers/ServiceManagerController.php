<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\ProductSubCategory;
use App\ProductCategory;
use App\Product;
use App\SearchHistory;
use App\Unit;
use File;
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
    public function productIndex() {
        $products = Auth::user()->addProducts;
        return view('admin.product-manager.index', ['prodData' => $products]);
    }
    public function editProductIndex($id) {
        $editProd = Product::find($id);
        $category = ProductCategory::all();
        $subCategory = ProductSubCategory::all();
        $unit = Unit::all();
        return view('admin.product-manager.editproduct', ['editProd' => $editProd, 'category' => $category, 'subCategory' => $subCategory, 'unit' => $unit]);

    }
    public function updateProduct(Request $request, $product_id, $category_id, 
        $subcategory_id, $unit_id)
        {
             $data = Product::find($product_id);
         // dd($subcategory_id);
        $cat = ProductCategory::find($category_id);

        $subCat = ProductSubCategory::find($subcategory_id);
        

        // $this->validate($request, [
        //     'name' => 'required',
        //     'features' => 'required',
        //     'price' => 'required',
        // ]);

        // dd($request);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            // dd($file);
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/products', $filename);
        } else {
            $filename = "noimage.jpg";
        }

        if( $request->category != null) {   
            $id = ProductCategory::all(); 
            $data->product_category_id = sizeof($id) + 1;
            $cat->category_name = $request->category;
            $subCat->product_category_id = sizeof($id) + 1;
            $cat->save();

        }
        else {
            $data->product_category_id = $request->cat;
            $subCat->product_category_id = $request->cat;
        }

        if( $request->subCategory != null){ 
            $id = ProductSubCategory::all();
            $subCat->sub_category_name = $request->subCategory;
            $data->product_sub_category_id = sizeof($id) + 1;
            $subCat->save();
            
        }
        else {
            $data->product_sub_category_id = $request->subCat;
        }

        if($request->unit !=null ) {
            // dd($request->unit);
            $id = Unit::all();
            $unitData = Unit::find($unit_id);
            $unitData->unit_name = $request->unit;
            $data->unit_id = sizeof($id) + 1;
            $unitData->save();
        }
        else {
            $data->unit_id = $request->unitSelect;
        }

        $data->product_name = $request->name;
        $data->image = $filename;
        $data->features = $request->features;
        $data->price = $request->price;
        $data->delivery_facility = $request->delivery;
        $data->delivery_charges = $request->deliveryCharge;
        $data->insurance_on_delivery = $request->insuranceOnDelivery;
        $data->product_manufactured_date = $request->manufacturedDate;
        $data->product_expiry_date = $request->expiryDate;
        
        $data->save();
        return redirect()->back();
        
    }
    public function deleteProd($id) {
        // dd("asdf");
        $product = Product::find($id);
        if($product->image !='noimage.jpg'){
            //delete Image
            File::delete('uploads/products/'.$product->image);
        }
        // dd($product);
        $product->delete();
        return redirect()->back();
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
    public function addProductIndex() {
        $category = ProductCategory::all();
        $subCategory = ProductSubCategory::all();
        $unit = Unit::all();
        return view('admin.product-manager.addproduct', ['category' => $category, 'subCategory' => $subCategory, 'unit' => $unit]);
    }
    public function addProduct() {
        $data = new Product;
        $cat = new ProductCategory;
        $subCat = new ProductSubCategory;
        

        $this->validate($request, [
            'name' => 'required',
            'features' => 'required',
            'price' => 'required',
        ]);

        // dd($request);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            // dd($file);
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/products', $filename);
        } else {
            $filename = "noimage.jpg";
        }

        if( $request->category != null) {   
            $id = ProductCategory::all(); 
            $data->product_category_id = sizeof($id) + 1;
            $cat->category_name = $request->category;
            $subCat->product_category_id = sizeof($id) + 1;
            $cat->save();

        }
        else {
            $data->product_category_id = $request->cat;
            $subCat->product_category_id = $request->cat;
        }

        if( $request->subCategory != null){ 
            $id = ProductSubCategory::all();
            $subCat->sub_category_name = $request->subCategory;
            $data->product_sub_category_id = sizeof($id) + 1;
            $subCat->save();
            
        }
        else {
            $data->product_sub_category_id = $request->subCat;
        }

        if($request->unit !=null ) {
            // dd($request->unit);
            $id = Unit::all();
            $unitData = new Unit;
            $unitData->unit_name = $request->unit;
            $data->unit_id = sizeof($id) + 1;
            $unitData->save();
        }
        else {
            $data->unit_id = $request->unitSelect;
        }

        $data->product_name = $request->name;
        $data->image = $filename;
        $data->features = $request->features;
        $data->price = $request->price;
        $data->delivery_facility = $request->delivery;
        $data->delivery_charges = $request->deliveryCharge;
        $data->insurance_on_delivery = $request->insuranceOnDelivery;
        $data->product_manufactured_date = $request->manufacturedDate;
        $data->product_expiry_date = $request->expiryDate;
        $data->user_id = Auth::user()->id;
        
        $data->save();
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
