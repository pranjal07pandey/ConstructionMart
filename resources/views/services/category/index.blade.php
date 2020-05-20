{{-- <!DOCTYPE html>
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
<a href="/dashboard" class="pull-right btn btn-primary">Return to Dashboard</a>


  </div>

  <br> --}}

@extends('admin.layouts.master')

@section('title')

Dashboard
    
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Services Categories</h3>
                    <a href="/services-categories/create" class="btn btn-primary">Add new Category</a>

                </div>
                <br>

                    <div class="card-body">

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
                                      <p style="font-size: 20px">Belongs to: {{$service->service->title}} </p>
                                        <small>Added on:  {{$service->created_at}}</small>
                                        <br>
                                        
                                        </div>
                                </div>
                                </div>

                            {{-- </div> --}}
                            </div>
                            {{-- {{$service->title}} --}}
                            <hr>
                            @endforeach

                            {{$category->links()}}

                            @else
                            <p>No category found</p>

                            @endif

                            
                </div>
              </div>
          </div>
      </div>
  </div>

  
  @endsection

  @section('scripts')
      
  @endsection
{{-- @include('include.footer')
@include('include.js')

</body>
</html> --}}