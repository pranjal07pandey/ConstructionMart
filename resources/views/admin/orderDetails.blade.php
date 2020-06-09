@extends('admin.layouts.master')

@section('title')

Order Details
    
@endsection


@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Order Details</h3>
                </div>
                {{-- <div class="container">

                    <a href="/dashboard" class="btn btn-primary">Go Back</a>
                    </div> --}}
                <div class="card-body">
                    <form action="/order-details/{{$orders->id}}" method="POST">
                        @csrf

                    <div class="form-group">
                        <label>Ordered By:</label>
                    <option type="text" class="form-control" >{{$orders->name}}</option>
                      </div>
                      <div class="form-group">
                        <label>Ordered Service:</label>
                    <option type="text" class="form-control" >{{$orders->service}}</option>
                      </div>
                      <div class="form-group">
                        <label>Loation:</label>
                    <option type="text" class="form-control" >{{$orders->location}}</option>
                      </div>
                      <div class="form-group">
                        <label>Phone:</label>
                    <option type="text" class="form-control" >{{$orders->phone}}</option>
                      </div>
                      <div class="form-group">
                        <label>Email:</label>
                    <option type="text" class="form-control" >{{$orders->email}}</option>
                      </div>

                    <img style="width:100%; height:400px" src="/storage/cover_images/{{$orders->cover_image}}" alt="no image uploaded">


                      <div class="form-group">
                        <label>message:</label>
                    <option type="text" class="form-control" >{{$orders->message}}</option>
                      </div>

                      <div class="form-group">
                        <label>Delivered?</label>
                        <select name="delivered"  class="form-control">
                            <option value="no">No</option>
                            <option value="Yes">Yes</option>
                            <option value="pending">Pending</option>

                        </select>
                      </div>
                      <button type="submit" class="btn">save changes</button>

                      <a href="/dashboard" class="btn btn-danger">cancel</a>


                    </form>


                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
    
@endsection