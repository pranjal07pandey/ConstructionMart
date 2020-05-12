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

  <div class="container">

<h1 align="center">Service Categories</h1>

<a href="/services-categories/create" class="btn btn-primary">Add new Category</a>

  </div>

  <br>

@if(count($category)>0)

@foreach ($category as $service)
<div class="container">
    {{-- <div class="jumbotron"> --}}
    <div class="well">
        <div class="row">
            <div class="col-md-4 col-sm-4">
            <h3><a href="/services-categories/{{$service->id}}">{{$service->cat_title}}</a></h3>
                
            </div>
        
        <div class="col-md-8 col-sm-8">
            <small>Added on:  {{$service->created_at}}</small>
            <br>
            <small>Belongs to: {{$service->service->title}}  </small>
            </div>
    </div>
    </div>

{{-- </div> --}}
</div>
{{-- {{$service->title}} --}}
@endforeach

{{$category->links()}}

@else
<p>No category found</p>

@endif

@include('include.footer')
@include('include.js')

</body>
</html>