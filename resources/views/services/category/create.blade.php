<!DOCTYPE html>
<html>
<body>

<h2>Add Service Categries</h2>

<form action="{{ action('ServiceCategoryController@store') }}" method="POST">
    @csrf
  <label for="cat_title">Category:</label><br>
  <input type="text" name="cat_title"><br>

  <label for="lname">Belongs to:</label><br>
  <select name="service_id">

    @foreach ($services as $service)

    <option value="{{$service->id}}">{{$service->title}}</option>
        
    @endforeach
    
  </select>
<br>
  <input type="submit" value="Add">
</form> 

</body>
</html>