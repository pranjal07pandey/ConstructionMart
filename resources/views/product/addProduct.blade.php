<!DOCTYPE html>
<html>
<head>

	<title></title>
</head>
<body>
<br>
<h3 style="margin-left: 10%;">Add Product</h3>
  <div style="width: 80%; margin-left: 10%">
<form method="post" action="/add/product" enctype='multipart/form-data'>
	@csrf
	<div class="form-group">
    <label for="exampleFormControlInput1">Product Name</label>
    <input type="text" name = "name" class="form-control" id="exampleFormControlInput1" placeholder="Product Name">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Select Image</label>
    <input type="file" name = "image" class="form-control-file" id="exampleFormControlFile1">
  </div>

 <div class="form-group">
    <label for="exampleFormControlInput1">Category Name</label>
    <input type="text" name="category" class="form-control" id="" placeholder="Category Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Category Select</label>
    <select class="form-control" name="cat" id="exampleFormControlSelect1">
      @foreach($category as $catData)
			<option value="{{$catData->id}}">{{$catData->category_name}}</option>
		@endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Sub-Category Name</label>
    <input type="text" name="subCategory" class="form-control" id="" placeholder="Sub-Category Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Sub-Category Select</label>
    <select class="form-control" name = "subCat" id="exampleFormControlSelect1">
      @foreach($subCategory as $subCatData)
			<option value="{{$subCatData->id}}">{{$subCatData->sub_category_name}}</option>
		@endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Features</label>
    <textarea class="form-control" name="features" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Price Per Unit</label>
    <input type="number" name = "price" class="form-control" id="exampleFormControlInput1" placeholder="Price">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Unit</label>
    <input type="text" name = "unit" class="form-control" id="exampleFormControlInput1" placeholder="Unit">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Unit Select</label>
    <select class="form-control" name="unitSelect" id="exampleFormControlSelect1">
      @foreach($unit as $unitData)
      <option value="{{$unitData->id}}">{{$unitData->unit_name}}</option>
    @endforeach
    </select>
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
    <label for="exampleFormControlInput1">Delivery Charge</label>
    <input type="text" name = "deliveryCharge" class="form-control" id="exampleFormControlInput1" placeholder="Delivery Charge">
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
    <label for="exampleFormControlInput1">Product Manufactured Date</label>
    <input type="date" name = "manufacturedDate" class="form-control" id="exampleFormControlInput1" placeholder="Product Manufactured Date">
  </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Product Expiry Date</label>
    <input type="date" name = "expiryDate" class="form-control" id="exampleFormControlInput1" placeholder="Product Manufactured Date">
  </div>
  <input type="submit" name="">
  <br>
  <p></p>
</form>
</div>
</body>
</html>



	