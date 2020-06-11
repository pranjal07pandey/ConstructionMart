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

  @include('include.header')

<h2 align="center">Edit Service</h2>


<div class="container">
<div class="jumbotron">



{!! Form::open(['action' => ['ServicesController@update',$service->id],'method'=>'POST','enctype'=> 'multipart/form-data']) !!}

@csrf

<div class="form-group">
  {{form::label('title', 'Title')}}
  {{form::text('title',$service->title,['class'=>'form-control','placeholder'=>'Title'])}}
</div>

<div class="form-group">
  {{form::label('description', 'Description')}}
  {{form::text('title',$service->description,['class'=>'form-control','placeholder'=>'description'])}}
</div>

<img style="width:50%; height:350px" src="{{ URL::asset('uploads/services/'.$service->cover_image)}}">
<br>

<label for="cover_image">New Image:</label><br>
        <input type="file" name="cover_image"><br>

    {{form::hidden('_method', 'PUT')}}
    {{form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

</div>
</div>

@include('include.footer')
@include('include.js')


</body>
</html>








