<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\ProductSubCategory;
use App\ProductCategory;
use App\Product;

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

        $data->product_name = $request->name;
        $data->image = $filename;
        $data->features = $request->features;
        $data->price = $request->price;
        $data->dimension = $request->dimension;
        $data->save();
        return redirect()->back();
    }

    public function subCatProducts($id) {
        $data = Product::where('product_sub_category_id', $id)->orderBy('created_at')->get();
        return view('product.showProduct', ['data' => $data]);
    }

    //throws category matchng product to view showProduct
    public function catProducts($id) {
        $data = Product::where('product_category_id', $id)->orderBy('created_at')
        ->get();
        return view('product.showProduct', ['data' => $data]);
    }
    //throws other products
    public function allProducts() {
        $data = Product::all();
        return view('product.showProduct', ['data' => $data]);
    }

    //search product
    public function search(Request $request) {
        $searchData = $request->search;
        // dd($searchData);
        $data = Product::where('product_name', 'LIKE', $searchData.'%')->get();
        // dd($data);
        if($data) {
            return view('product.showProduct', ['data' => $data]);
        }
        else {
            return View::make('product.showProduct')->with('msg', 'no carpet found');
        }
    }

    //Add to cart
    public function cart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->back();
    }


    public function showCart() {
        if(!Session::has('cart')) {
            return view('include.header', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $count = count($cart->items);
        return view('product.cartProducts', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'count' => $count]);
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
}
