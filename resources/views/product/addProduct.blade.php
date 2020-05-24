<!DOCTYPE html>
<html>
<head>

	<title></title>

    @include('include.css')
</head>
<body>
   @include('include.header')
    @include('include.js')<br>
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
    <label for="exampleFormControlInput1">Price</label>
    <input type="number" name = "price" class="form-control" id="exampleFormControlInput1" placeholder="Price">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Dimension</label>
    <input type="text" name = "dimension" class="form-control" id="exampleFormControlInput1" placeholder="Dimension">
  </div>
  <input type="submit" name="">
  <br>
  <p></p>
</form>
</div>
</body>
</html>



	