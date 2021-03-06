
@extends('admin.layouts.master')
{{-- @if(Auth::check())
    @if (Auth::user()->usertype=='serviceManager')
    @extends('admin.layouts.smMaster')
    @endif
@endif --}}

@section('title')

Create Service    
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add New Service</h3>
                </div>
                <div class="card-body">

<form action="{{ action('ServicesController@store') }}" method="POST" enctype="multipart/form-data" >
  @csrf

  <div class="form-group">
    <label for="title">Title:</label><br>
    <input type="text" name="title" class="form-control" placeholder="title" required><br>
    </div>

    <div class="form-group">
      <label for="description">Description:</label><br>
      <input type="text" name="description" class="form-control" placeholder="description" ><br>
      </div>

      
        <label for="cover_image">Image upload:</label><br>
        <input type="file" name="cover_image" required><br>
        

  <input type="submit" class="btn btn-primary" value="Add">


</form>

</div>

</div>

</div>
</div>
</div>


@endsection

  @section('scripts')
      
  @endsection




