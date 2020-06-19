
@extends('admin.layouts.master')

@section('title')

Edit Service 
    
@endsection


@section('content')


<div class="container">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h3>Edit Service</h3>
              </div>
              <div class="card-body">

              <form action="/services-update/{{$service->id}}" method="POST" enctype="multipart/form-data" >
                  @csrf
                
                  <div class="form-group">
                    <label for="title">Title:</label><br>
                  <input type="text" name="title" class="form-control" placeholder="title" value="{{$service->title}}"><br>
                    </div>
                
                    <div class="form-group">
                      <label for="description">Description:</label><br>
                      <input type="text" name="description" class="form-control" placeholder="description" value="{{$service->description}}"  ><br>
                      </div>
                
                
                      <img style="width:50%; height:350px" src="{{ URL::asset('uploads/services/'.$service->cover_image)}}}">
                
                      
                        <label for="cover_image">New Image:</label><br>
                        <input type="file" name="cover_image"><br>
                        
                
                  <input type="submit" class="btn btn-primary" value="Update">
                
                
                </form>

{{-- 
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
{!! Form::close() !!} --}}

              </div>
          </div>
      </div>
  </div>
</div>




@endsection

  @section('scripts')
      
  @endsection






