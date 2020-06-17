@extends('admin.layouts.master')


@section('title')

Edit Product
    
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Product</h3>
                </div>
                <div class="card-body">


<form action="{{url('/update/product/'.$editProd->id.'/'.
  $editProd->product_category_id.'/'.$editProd->product_sub_category_id)}}" method="POST" enctype="multipart/form-data" >
  @csrf

  <div class="form-group">
    <label for="title">Product Name:</label><br>
    <input type="text" name="name" class="form-control"  required value="{{$editProd->product_name}}"><br>
    </div>

    <div>
      <label for="Select Image">Select Image</label><br>
      <input type="file" name="image" value="{{ URL::asset('uploads/products/'.$editProd->image)}}"><br>
      </div>
<div class="form-group">
    <label for="Category Name">Category Name</label>
    <input type="text" name="category" class="form-control" id="" placeholder="Category Name">
  </div>
  <div class="form-group">
    <label for="Category Select">Category Select</label>
    <select class="form-control" name="cat" id="exampleFormControlSelect1">
      @foreach($category as $catData)
      <option value="{{$catData->id}}">{{$catData->category_name}}</option>
    @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="Sub-Category Name">Sub-Category Name</label>
    <input type="text" name="subCategory" class="form-control" id="" placeholder="Sub-Category Name">
  </div>
  <div class="form-group">
    <label for="Sub-Category Select">Sub-Category Select</label>
    <select class="form-control" name = "subCat" id="exampleFormControlSelect1">
      @foreach($subCategory as $subCatData)
      <option value="{{$subCatData->id}}">{{$subCatData->sub_category_name}}</option>
    @endforeach
    </select>
  </div>
   <div class="form-group">
    <label for="Features">Features</label>
    <input type = "text" class="form-control" name="features" id="exampleFormControlTextarea1" rows="3" value = "{{$editProd->features}}"></textarea>
  </div>
      
<div class="form-group">
    <label for="Price Per Unit">Price Per Unit</label>
    <input type="number" name = "price" class="form-control" id="exampleFormControlInput1" placeholder="Price" value="{{$editProd->price}}">
  </div> 
  <div class="form-group">
    <label for="Unit">Unit</label>
    <input type="text" name = "unit" class="form-control" id="exampleFormControlInput1" placeholder="Unit" value=
    "{{$editProd->unit}}">
  </div>
  <div class="form-check">
    <p>Delivery Facility</p>
  <input class="form-check-input" type="radio" name="delivery" id="exampleRadios1" value="1" checked>
  <label class="form-check-label" for="exampleRadios1">
    Yes there is delivery facility
  </label>
</div>
<div class="form-check">

  <input class="form-check-input" type="radio" name="delivery" id="exampleRadios2" value="0">
  <label class="form-check-label" for="exampleRadios2">
    No there is not delivery facility
  </label>
</div>
<div class="form-group">
    <label for="Delivery Charge">Delivery Charge</label>
    <input type="text" name = "deliveryCharge" class="form-control" id="exampleFormControlInput1" placeholder="Delivery Charge" value="{{$editProd->delivery_charges}}">
  </div>
    <div class="form-check">
    <p>Insurance On Delivery</p>
  <input class="form-check-input" type="radio" name="insuranceOnDelivery" id="exampleRadios1" value="1" checked>
  <label class="form-check-label" for="exampleRadios1">
    Yes 
  </label>
</div>
<div class="form-check">

  <input class="form-check-input" type="radio" name="insuranceOnDelivery" id="exampleRadios2" value="0">
  <label class="form-check-label" for="exampleRadios2">
    No 
  </label>
</div>
<div class="form-group">
    <label for="Product Manufactured Date">Product Manufactured Date</label>
    <input type="date" name = "manufacturedDate" class="form-control" id="exampleFormControlInput1" placeholder="Product Manufactured Date" value="{{$editProd->product_manufactured_date}}">
  </div>

    <div class="form-group">
    <label for="exampleFormControlInput1">Product Expiry Date</label>
    <input type="date" name = "expiryDate" class="form-control" id="exampleFormControlInput1" placeholder="Product Manufactured Date" value="{{$editProd->product_expiry_date}}">
  </div>

  <input type="submit" class="btn btn-primary" value="Edit">


</form>

</div>

</div>

</div>
</div>
</div>

@endsection

@section('scripts')
    
@endsection




























