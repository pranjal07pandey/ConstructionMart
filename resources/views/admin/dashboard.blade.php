@extends('admin.layouts.master')



@section('title')

Dashboard
    
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Service order history</h4>
        </div>
        <div class="card-body">
          {{-- <div class="card-header">
            <h5 class="card-title">Service order history</h5>
          </div> --}}
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Ordered Service</th>
                <th>Ordered Location</th>

                <th>Ordered Date</th>
                <th>Delivered?</th>
                <th>Option</th>




              </thead>

              <tbody>
                @foreach ($orders as $order)


                <tr>

                    <td>{{$order->service}} </td>
                    <td>{{$order->location}} </td>

                    <td>{{$order->created_at}} </td>
                    <td>{{$order->delivered}} </td>
               

                <td> <a href="order-details/{{$order->id}}" class="btn">View details
                  </a>
                </td>

                </tr>
                @endforeach

              </tbody>


            </table>
            {{$orders->links()}}

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Product order history</h4>
        </div>
        <div class="card-body">
          
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                {{-- <th>User Name</th>
                <th>Phone</th>
                <th>Ordered Location</th>
                  
                <th>Email</th>
                <th>Message</th>
                <th>Product Ordered</th>  
                <th>Ordered Date</th> --}}

                <th>Ordered Product</th>
                <th>Ordered Location</th>

                <th>Ordered Date</th>
                <th>Delivered?</th>
                <th>Option</th>


              </thead>

              <tbody>
                @foreach ($productOrders as $order)


                <tr>
                  <td>{{$order->product->product_name}}</td>
                  <td>{{$order->location}} </td>
                  <td>{{$order->created_at}}</td>
                  <td>{{$order->delivered}}</td>
                  <td> <a href="order-details-products/{{$order->id}}" class="btn">View details
                  </a>
                </td>




                    {{-- <td>{{$order->user->name}} </td>
                    <td>{{$order->phone_number}} </td>
                    <td>{{$order->email}} </td>
                    <td>{{$order->message}} </td> --}}

                </tr>
                @endforeach

              </tbody>


            </table>
            {{$orders->links()}}
            {{$productOrders->links()}}

          </div>
        </div>
      </div>
    </div>
  </div>

 
    
@endsection

@section('scripts')
    
@endsection
