@extends('admin.layouts.smMaster')
  

@section('title')

Service Categories
    
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

            <form action="/service-cat-update/{{$category->id}}" method="POST" enctype="multipart/form-data" >
  @csrf

  <div class="form-group">
    <label for="title">Title:</label><br>
  <input type="text" name="title" class="form-control" placeholder="title" value="{{$category->cat_title}}"><br>
    </div>

    <div class="form-group">
      <label for="description">Description:</label><br>
      <input type="text" name="description" class="form-control" placeholder="description" value="{{$category->description}}"  ><br>
      </div>


      <img style="width:100%; height:400px" src="/storage/cover_images/{{$category->cover_image}}">

      
        <label for="cover_image">New Image:</label><br>
        <input type="file" name="cover_image"><br>
        

        
        {{-- enable when update controller is completed --}}
  {{-- <input type="submit" class="btn btn-primary" value="Update"> --}}


</form>

@endsection

@section('scripts')
    
@endsection