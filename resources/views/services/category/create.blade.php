<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('include.css')

</head>
<body>
       <!-- wpf loader Two -->
       <div id="wpf-loader-two">          
        <div class="wpf-loader-two-inner">
          <span>Loading</span>
        </div>
      </div> 
      <!-- / wpf loader Two -->       
    <!-- SCROLL TOP BUTTON -->
      <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

  @include('include.header')

<h2 align="center">Add Service Categries</h2>
<br>

<div class="container">
<div class="jumbotron">


<form action="{{ action('ServiceCategoryController@store') }}" method="POST">
    @csrf

    <div class="form-group">
  <label for="cat_title">Category:</label><br>
  <input type="text" name="cat_title" class="form-control" required><br>
    </div>

    <div class="form-group">

  <label for="belonging_to">Belongs to:</label><br>
  <select name="service_id" class="form-control">

    @foreach ($services as $service)

    <option value="{{$service->id}}">{{$service->title}}</option>
        
    @endforeach
    
  </select>
    </div>
<br>
  <input type="submit" class="btn btn-primary" value="Add">
</form> 

</div>
</div>


@include('include.footer')
@include('include.js')

</body>
</html>