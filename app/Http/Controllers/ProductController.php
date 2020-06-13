<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cart;
use App\ProductSubCategory;
use App\ProductCategory;
use App\Product;
use App\SearchHistory;
use File;
use App\Service;
use DB;
use Auth;
use Image;

// use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = ProductCategory::all();
        $subCategory = ProductSubCategory::all();

        if($category == null) {
            return view('product.addProduct');
        }
        else {
        return view('product.addProduct',['category' => $category, 'subCategory' => $subCategory]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Redirect to add Prodct blade file

    //stores the product
    public function store(Request $request)
    {
        $data = new Product;
        $cat = new ProductCategory;
        $subCat = new ProductSubCategory;

        

        $this->validate($request, [
            'name' => 'required',
            'features' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'image' => 'image|nullable',
        ]);

        // dd($request);

        if($request->hasFile('image')) {
            // dd("success");
            $file = $request->file('image');
            // dd($file);
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $img = Image::make($request->file('image'))->resize(300, 200)->save('uploads/products/'.$filename, 60);
            // dd($img);
        } else {
            // dd("fail");
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


        $data->product_name = $request->name;
        $data->image = $filename;
        $data->features = $request->features;
        $data->price = $request->price;
        $data->unit = $request->unit;
        $data->delivery_facility = $request->delivery;
        $data->delivery_charges = $request->deliveryCharge;
        $data->insurance_on_delivery = $request->insuranceOnDelivery;
        $data->product_manufactured_date = $request->manufacturedDate;
        $data->product_expiry_date = $request->expiryDate;
        $data->user_id = Auth::user()->id;
        
        $data->save();
        return redirect()->back();
    }

    public function subCatProducts($id) {
        $data = Product::where('product_sub_category_id', $id)->orderBy('created_at', 'desc')->paginate(12);
        return view('product.showProduct', ['data' => $data]);
    }

    //throws category matchng product to view showProduct
    public function catProducts($id) {
        $data = Product::where('product_category_id', $id)->orderBy('created_at', 'desc')
        ->paginate(12);
        return view('product.showProduct', ['data' => $data]);
    }
    //throws other products
    public function allProducts() {
        $data = Product::orderBy('created_at', 'desc')->paginate(12);
        return view('product.showProduct', ['data' => $data]);
    }

    //search product
    public function search(Request $request) {
        $searchData = new SearchHistory;
          if(Auth::user() && $request->search) {
            $user_id = Auth::user()->id;
            $searchData->search = $request->search;
            $searchData->user_id = $user_id;
            $searchData->save();
        }

        $searchData = $request->search;
        // dd($searchData);
        $data = Product::where('product_name', 'LIKE', $searchData.'%')->paginate(5);
        $serviceData = Service::where('title', 'LIKE', $searchData.'%')->paginate(5);
        // dd($serviceData);
        if($data) {
            return view('product.searchData', ['prodDetails' => $data, 'serviceData' => 
                $serviceData]);
        }
        else {
            return View::make('product.searchData')->with('msg', 'no carpet found');
        } 
    }

    public function adminSearch(Request $request) {
        $searchData = new SearchHistory;
          if(Auth::user() && $request->search) {
            $user_id = Auth::user()->id;
            $searchData->search = $request->search;
            $searchData->user_id = $user_id;
            $searchData->save();
        }

        $searchData = $request->search;
        // dd($searchData);
        $data = Product::where('product_name', 'LIKE', $searchData.'%')->get();
        $serviceData = Service::where('title', 'LIKE', $searchData.'%')->get();
        // dd($data);
        if($data) {
            return view('admin.product-manager.adminSearch', ['data' => $data, 'serviceData' => $serviceData]);
        }
        else {
            return View::make('admin.product-manager.adminSearch')->with('msg', 'no carpet found');
        } 

    }

    public function serviceManagerSearch(Request $request) {
        $searchData = new SearchHistory;
          if(Auth::user() && $request->search) {
            $user_id = Auth::user()->id;
            $searchData->search = $request->search;
            $searchData->user_id = $user_id;
            $searchData->save();
        }

        $searchData = $request->search;
        // dd($searchData);
        $data = Product::where('product_name', 'LIKE', $searchData.'%')->get();
        $serviceData = Service::where('title', 'LIKE', $searchData.'%')->get();
        // dd($data);
        if($data) {
            return view('admin.product-manager.adminManagerSearch', ['data' => $data, 'serviceData' => $serviceData]);
        }
        else {
            return View::make('admin.product-manager.adminManagerSearch')->with('msg', 'no carpet found');
        }       
    }

    //Add to cart

    public function cart(Request $request, $id) {
        $product = Product::find($id);
        $addToCart = Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->price,
            'quantity' => 1,
            'image' => $product->image,
        ]);
        // $oldCart = Session::has('cart') ? Session::get('cart') : null;
        // $cart = new Cart($oldCart);
        // $cart->add($product, $product->id);

        // $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->back();
    }
    public function removeCart($id) {
        Cart::remove($id);
        return redirect()->back();
    }

    public function moveToCart($id) {
        // dd("succes");
        $product = Product::find($id);
        $addToCart = Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->price,
            'quantity' => 1,
            'image' => $product->image,
        ]);
        $wishlist = app('wishlist');
        $wishlist->remove($id);
        return redirect()->back();
    }


    public function showCart() {
        $recommendProd = Product::paginate(4);
        $cartData = Cart::getContent();
        $wishlist = app('wishlist');
        $wishlistData = $wishlist->getContent();
        return view('product.cartProducts', ['products' => $cartData, 'wishlist' => $wishlistData, 'recommendProd' => $recommendProd]);

        // if(!Session::has('cart')) {
        //     return view('include.header', ['products' => null]);
        // }
        // $oldCart = Session::get('cart');
        // $cart = new Cart($oldCart);
        // $count = count($cart->items);
        // return view('product.cartProducts', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'count' => $count]);
    }

    public function updateCart(Request $request) {

        $id = $request->ids;
        $quantity = $request->quantity;
        $price = $request->price;

        // for($i = 0; $i <  sizeof($id); $i++) {
        //     $total = $sum + ($quantity * $price);
        // }
        Cart::update($id, array(
            'quantity' => array(
                'relative' =>false,
                'value' => $quantity
            ),
        ));

        $total = Cart::getTotal();

        return response()->json([
            'quantity' => $quantity,
            'price' => $price,
            'id' => $id,
            'total' => $total,
        ]);
    }

    public function wishlistCart($id) {

        $product = Product::find($id);
        // dd($item);
        Cart::remove($id);

        $wish_list = app('wishlist');
        $wish_list->add([
            'id' => $product->id,
            'name' => $product->product_name, 
            'price' => $product->price,
            'quantity' => 1,
            'image' => $product->image,
        ]);
        return redirect()->back();       
    }

    

    public function productIndex() {
        $prodData = Product::paginate(15);
        // dd($prodData);
        return view('product.index', ['prodData' => $prodData]);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editProd = Product::find($id);
        // dd($editProd);
        $category = ProductCategory::all();
        $subCategory = ProductSubCategory::all();
        return view('product.editProduct', ['editProd' => $editProd, 'category' => $category, 'subCategory' => $subCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id, $category_id, 
        $subcategory_id)
    {
         $data = Product::find($product_id);
         // dd($subcategory_id);
        $cat = ProductCategory::find($category_id);

        $subCat = ProductSubCategory::find($subcategory_id);
        

        $this->validate($request, [
            'name' => 'required',
            'features' => 'required',
            'price' => 'required',
        ]);


        if($request->hasFile('image')) {
            // dd("success");
            $file = $request->file('image');
            // dd($file);
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $img = Image::make($request->file('image'))->resize(300, 200)->save('uploads/products/'.$filename, 60);
            // dd($img);
        } else {
            // dd("fail");
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

        $data->product_name = $request->name;
        $data->image = $filename;
        $data->features = $request->features;
        $data->price = $request->price;
        $data->unit = $request->unit;
        $data->delivery_facility = $request->delivery;
        $data->delivery_charges = $request->deliveryCharge;
        $data->insurance_on_delivery = $request->insuranceOnDelivery;
        $data->product_manufactured_date = $request->manufacturedDate;
        $data->product_expiry_date = $request->expiryDate;
        $subCat->save();
        $data->save();
        return redirect()->back();
        
    }
    //product Details
    public function productDetails($id) {
        $prodDetails = Product::find($id);
        return view('home.productDetails', ['prodDetails' => $prodDetails]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->image !='noimage.jpg'){
            //delete Image
            File::delete('uploads/products/'.$product->image);
        }
        // dd($product);
        $product->delete();
        return redirect()->back();
    }
}
