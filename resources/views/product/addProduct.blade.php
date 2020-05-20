<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="/add/product" enctype='multipart/form-data'>
	@csrf
	<input type="text" name="subCategory" placeholder="sub category">
		<select name = "subCat">
		@foreach($subCategory as $subCatData)
			<option value="{{$subCatData->id}}">{{$subCatData->sub_category_name}}</option>
		@endforeach
	</select><br>
	<input type="text" name="category" placeholder="category"><br>
	<select name="cat">
		@foreach($category as $catData)
			<option value="{{$catData->id}}">{{$catData->category_name}}</option>
		@endforeach
	</select>
	<input type="name" name="name" placeholder="product name"><br>
	image<input type="file" name="image"><br>
	<input type="text" name="features" placeholder="features"><br>
	<input type="text" name="price" placeholder="price"><br>
	<input type="text" name="dimension" placeholder="dimension"><br>
	<input type="submit">
</form>
</body>
</html>