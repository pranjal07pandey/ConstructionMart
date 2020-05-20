
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


<form action="{{ action('ServiceCategoryController@store') }}" method="POST">
    @csrf

    <div class="form-group">
  <label for="cat_title">Category:</label><br>
  <input type="text" name="cat_title" class="form-control" required><br>
    </div>

    <div class="form-group">

  <label for="belonging_to">Belongs to:</label><br>
  <select name="service_id" class="form-control">

    @foreach ($services as $service)

    <option value="{{$service->id}}">{{$service->title}}</option>
        
    @endforeach
    
  </select>
    </div>
<br>
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
