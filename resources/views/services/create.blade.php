
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
                    <h3>Add New Service Category</h3>
                </div>
                <div class="card-body">

<form action="{{ action('ServicesController@store') }}" method="POST">
  @csrf

  <div class="form-group">
    <label for="title">Title:</label><br>
    <input type="text" name="title" class="form-control" placeholder="title" required><br>
    </div>

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




