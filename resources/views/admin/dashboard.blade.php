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
                <th>User Name</th>
                <th>Ordered Service</th>
                <th>Phone</th>
                <th>Ordered Location</th>
                <th>Email</th>
                <th>Message</th>
                <th>Ordered Date</th>



              </thead>

              <tbody>
                @foreach ($orders as $order)


                <tr>

                    <td>{{$order->name}} </td>
                    <td>{{$order->service}} </td>
                    <td>{{$order->phone}} </td>
                    <td>{{$order->location}} </td>
                    <td>{{$order->email}} </td>
                    <td>{{$order->message}} </td>
                    <td>{{$order->created_at}} </td>
                      
                  
                    
                    

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
                <th>User Name</th>
                <th>Ordered Service</th>
                <th>Phone</th>
                <th>Ordered Location</th>
                <th>Email</th>
                <th>Message</th>
                <th>Ordered Date</th>



              </thead>

              <tbody>
                @foreach ($orders as $order)


                <tr>

                    <td>{{$order->name}} </td>
                    <td>{{$order->service}} </td>
                    <td>{{$order->phone}} </td>
                    <td>{{$order->location}} </td>
                    <td>{{$order->email}} </td>
                    <td>{{$order->message}} </td>
                    <td>{{$order->created_at}} </td>
                      
                  
                    
                    

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
    
@endsection

@section('scripts')
    
@endsection
