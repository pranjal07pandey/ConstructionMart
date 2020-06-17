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
                    <form action="/order-details-products/{{$productOrders->id}}" method="POST">
                        @csrf

                    <div class="form-group">
                        <label>Ordered By:</label>
                    <option type="text" class="form-control" >{{$productOrders->user->name}}</option>
                      </div>
                      <div class="form-group">
                        <label>Ordered Products:</label>
                    <option type="text" class="form-control" >{{$productOrders->product->product_name}}</option>
                      </div>
                      <div class="form-group">
                        <label>Loation:</label>
                    <option type="text" class="form-control" >{{$productOrders->location}}</option>
                      </div>
                      <div class="form-group">
                        <label>Phone:</label>
                    <option type="text" class="form-control" >{{$productOrders->phone_number}}</option>
                      </div>
                      <div class="form-group">
                        <label>Email:</label>
                    <option type="text" class="form-control" >{{$productOrders->email}}</option>
                      </div>

                      {{-- <div class="form-group">
                        <label>message:</label>
                    <option type="text" class="form-control" >{{$productOrders->message}}</option>
                      </div> --}}

                      @if ($productOrders->delivered == 'No')

                      <div class="form-group">
                        <label>Delivered?</label>
                        <select name="delivered"  class="form-control">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                      </div>
                          
                      @else

                          <div class="form-group">
                            <label>Delivered?</label>
                            <select name="delivered"  class="form-control">
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>

                          </select>
                        
                        </div>

                          
                      @endif

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