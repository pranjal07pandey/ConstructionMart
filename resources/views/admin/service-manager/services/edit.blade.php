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

<h2 align="center">Edit Service</h2>


<div class="container">
<div class="jumbotron">
{!! Form::open(['action' => ['ServicesController@update',$service->id],'method'=>'POST','enctype'=> 'multipart/form-data']) !!}

<div class="form-group">
  {{form::label('title', 'Title')}}
  {{form::text('title',$service->title,['class'=>'form-control','placeholder'=>'Title'])}}
</div>

    {{form::hidden('_method', 'PUT')}}
    {{form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

</div>
</div>

@include('include.footer')
@include('include.js')


</body>
</html> --}}


@extends('admin.layouts.smMaster')


@section('title')

Edit Service
    
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Service </h3>
                </div>
                <div class="card-body">

                  {{-- {{ action('ServiceManagerController@store') }} --}}

            <form action="/service-manager-update/{{$service->id}}" method="POST" enctype="multipart/form-data" >
  @csrf

  <div class="form-group">
    <label for="title">Title:</label><br>
  <input type="text" name="title" class="form-control" placeholder="title" value="{{$service->title}}"><br>
    </div>

    <div class="form-group">
      <label for="description">Description:</label><br>
      <input type="text" name="description" class="form-control" placeholder="description" value="{{$service->description}}"  ><br>
      </div>


      <img style="width:100%; height:400px" src="/storage/cover_images/{{$service->cover_image}}">

      
        <label for="cover_image">New Image:</label><br>
        <input type="file" name="cover_image"><br>
        

  <input type="submit" class="btn btn-primary" value="Update">


</form>

</div>

</div>

</div>
</div>
</div>


@endsection

  @section('scripts')
      
  @endsection





