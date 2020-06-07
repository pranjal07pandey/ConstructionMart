<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cart;
use App\ProductSubCategory;
use App\ProductCategory;
use App\Product;
use App\SearchHistory;
use App\Unit;
use Auth;
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
        $unit = Unit::all();

        if($category == null) {
            return view('product.addProduct');
        }
        else {
        return view('product.addProduct',['category' => $category, 'subCategory' => $subCategory, 'unit' => $unit]);
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
        
        $data->save();
        return redirect()->back();
    }

    public function subCatProducts($id) {
        $data = Product::where('product_sub_category_id', $id)->orderBy('created_at')->get();
        return view('product.showProduct', ['data' => $data]);
    }

    //throws category matchng product to view showProduct
    public function catProducts($id) {
        $data = Product::where('product_category_id', $id)->orderBy('created_at', 'desc')
        ->get();
        return view('product.showProduct', ['data' => $data]);
    }
    //throws other products
    public function allProducts() {
        $data = Product::orderBy('created_at', 'desc')->paginate(16);
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
        // dd($data);
        if($data) {
            return view('product.searchData', ['prodDetails' => $data]);
        }
        else {
            return View::make('product.searchData')->with('msg', 'no carpet found');
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

       $quantity = $request->quantity;
       $price = $request->price;
        return response()->json([
            'quantity' => $quantity,
            'price' => $price
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

    //throws vendor products
    public function adminProducts() {
        // $user_id = Auth::id();
        $products = Product::all();
        return view('product.adminProduct', ['products' => $products]);
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
        $category = ProductCategory::all();
        $subCategory = ProductSubCategory::all();
        $unit = Unit::all();
        return view('product.editProduct', ['editProd' => $editProd, 'category' => $category, 'subCategory' => $subCategory, 'unit' => $unit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id, $category_id, 
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
        Product::destroy($id);
        return redirect()->back();
    }
}
