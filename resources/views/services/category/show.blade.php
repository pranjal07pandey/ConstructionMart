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

  <div class="container">

    <h1 align="center">
        Category: {{$category->cat_title}}
        
    </h1>
</div>

<div class="container">
    <div class="jumbotron">
    
    <a href="/services-categories" class="btn btn-primary">Go Back</a>
    <br><br>
   

    <h5>Added on: {{$category->created_at}}</h5><br>
    <h4>Belongs to : {{$category->service->title}} </h4>
<br>
    <a href="/services-categories/{{$category->id}}/edit" class="btn btn-primary">Edit</a>
    
    {!!Form::open(['action'=>['ServiceCategoryController@destroy',$category->id], 'method'=>'POST','class'=>'pull-right'])!!}
    
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    
    {!!Form::close()!!}
    
    </div>
    </div>


    @include('include.footer')
@include('include.js')


    
</body>
</html>
