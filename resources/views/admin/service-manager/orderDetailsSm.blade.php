@extends('admin.layouts.smMaster')

@section('title')

Dashboard
 
@endsection


@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Order Details</h3>
                </div>
             
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

                      <a href="/sm-dashboard" class="btn btn-danger">cancel</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    
@endsection