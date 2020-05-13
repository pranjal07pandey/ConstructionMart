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
        {{$service->title}}
    </h1>
</div>
  

  <div class="container">
  <div class="jumbotron">

    
    <a href="/services" class="btn btn-primary">Go Back</a>
    <br><br>
   
    <p>Available Categories:</p>
            <div>
                @foreach ($service->serviceCategories as $category)
                <li>
                    {{$category->cat_title}}
                </li>
                    
                @endforeach
            </div>
<u><a href="/services-categories/create" >+Add new category</a></u>
    {{-- <small>Added on {{$service->created_at}}</small> --}}

<br>
<br>
    <a href="/services/{{$service->id}}/edit" class="btn btn-primary">Edit</a>
    
    {!!Form::open(['action'=>['ServicesController@destroy',$service->id], 'method'=>'POST','class'=>'pull-right'])!!}
    
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    
    {!!Form::close()!!}
    
  </div>
    </div>

@include('include.footer')
@include('include.js')


    
</body>
</html>


    