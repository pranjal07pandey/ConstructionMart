@extends('admin.layouts.smMaster')
  

@section('title')

Add Service Category
    
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

                    <form method="POST" action="/service-cat-manager-addCategory" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="cat_title">Category:</label><br>
                            <input type="text" name="cat_title" class="form-control" required><br>
                              </div>

                              <div class="form-group">
                                <label for="description">Description:</label><br>
                                <input type="text" name="description" class="form-control" ><br>
                                  </div>
                          
                                  <label for="cover_image">Image upload:</label><br>
                                  <input type="file" name="cover_image" required><br>
                          
                                  <br>
                          
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