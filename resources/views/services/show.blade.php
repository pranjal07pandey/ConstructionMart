
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
                <h3>{{$service->title}}</h3>
                </div>
                <div class="card-body">

    
    <a href="/services" class="btn btn-primary">Go Back</a>
    <br><br>

<img style="width:100%; height:400px" src="/storage/cover_images/{{$service->cover_image}}">

                <small>{{$service->description}}</small>
   
    <p>Available Categories:</p>
            <div>
                @foreach ($service->serviceCategories as $category)
                <li class="list-group-item">
                    {{$category->cat_title}}
                </li>
                <br>
                    
                @endforeach
            </div>
<u><a href="/services-categories/create" >+Add new category</a></u>
    {{-- <small>Added on {{$service->created_at}}</small> --}}

<br>
<br>
    <a href="/services/{{$service->id}}/edit" class="btn ">Edit</a>
    
    {!!Form::open(['action'=>['ServicesController@destroy',$service->id], 'method'=>'POST','class'=>'pull-right'])!!}
    
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    
    {!!Form::close()!!}
    
  </div>
    </div>

</div>

</div>

</div>
</div>
</div>
@endsection

  @section('scripts')
      
  @endsection



    