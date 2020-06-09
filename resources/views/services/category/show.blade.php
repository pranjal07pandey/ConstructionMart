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

  @include('include.header')

  <div class="container">

    <h1 align="center">
        Category: {{$category->cat_title}}
        
    </h1>
</div>

<div class="container">
    <div class="jumbotron"> --}}

        @extends('admin.layouts.master')

@section('title')

Edit User Role
    
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3>{{$category->cat_title}}</h3>
                </div>
                <div class="card-body">

    
    <a href="/services-categories" class="btn btn-primary">Go Back</a>
    <br><br>
   
<img style="width:100%; height:400px" src="/storage/cover_images/{{$category->cover_image}}">


    <h5>Added on: {{$category->created_at}}</h5><br>
    <h5>Descrption: {{$category->description}}</h5><br>

    <h4>Belongs to : {{$category->service->title}} </h4>
<br>
                <a href="/services-categories/edit/{{$category->id}}" class="btn">Edit</a>
    
    {!!Form::open(['action'=>['ServiceCategoryController@destroy',$category->id], 'method'=>'POST','class'=>'pull-right'])!!}
    
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    
    {!!Form::close()!!}
    
</div>

</div>

</div>
</div>
</div>


@endsection

  @section('scripts')
      
  @endsection

