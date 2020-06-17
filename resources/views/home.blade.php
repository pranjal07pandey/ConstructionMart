@extends('admin.layouts.normalUser')

@section('title')
Home
@endsection

@section('content')
{{-- 
<div class="content">
  <div class="row">
    <div class="col-md-10">
      <div class="card">

        <div class="card-header">
        <h3 class="title" align="center">{{__('customlang.My Order History')}}</h3>
        </div>

        <div class="card-body">
         
        </div>
      </div>

      <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
        
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Service Order History</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>Ordered Service</th>
                    <th>Ordered Date</th>
                    <th>Delivered</th>
                   
                  </thead>
                  
                  <tbody>
    

                    @foreach ($orders as $order)

                    <tr>
                        <td>{{$order->service}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->delivered}} </td>

                        
                    </tr>
                        
                    @endforeach

                    
                  </tbody>
    
                </table>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Product Order History</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>Ordered Product</th>
                    <th>Ordered Date</th>
                    <th>Delivered</th>


                  </thead>
            
                  <tbody>
                    @foreach($prodOrder as $datas)
                    <tr>
                        <td>{{$datas->phone_number}}</td>
                        <td>{{$datas->created_at}}</td>
                        <td> </td>
                    </tr>
                    @endforeach
                                            
                  </tbody>
    
                </table>
              </div>
            </div>
          </div>

    </div>
    
  </div>
</div> --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 align="center">{{__('customlang.My Order History')}}</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                          <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                  @if (session('success'))
                      <div class="alert alert-success alert-dismissible" role="alert">
                        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          {{ session('success') }}
                      </div>
                  @endif
              </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">{{__('customlang.Service Order')}}</h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table">
                              <thead class=" text-primary">
                                <th>{{__('customlang.Ordered Service')}}</th>
                                <th>{{__('customlang.Ordered Date')}}</th>
                                <th>{{__('customlang.Delivered')}}</th>

                                
                               

                              </thead>
                
                              <tbody>
                

                                @foreach ($orders as $order)

                                <tr>
                                    <td>{{$order->service}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->delivered}}</td>

                                   
                                    
                
                                </tr>
                                    
                                @endforeach

                                
                              </tbody>
                
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                

                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">{{__('customlang.Product Order')}}</h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table">
                              <thead class=" text-primary">
                                <th>{{__('customlang.Ordered Product')}}</th>
                                <th>{{__('customlang.Ordered Quantity')}}</th>
                                <th>{{__('customlang.Ordered Price')}}</th>

                                <th>{{__('customlang.Ordered Date')}}</th>
                                <th>{{__('customlang.Delivered')}}</th>


                           
                              </thead>
                
                              <tbody>
                

                                @foreach($prodOrder as $data)

                                <tr>
                                    <td>{{$data->product->product_name}}</td>
                                    <td>{{$data->quantity}}</td>
                                    <td>{{$data->price}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td>{{$data->delivered}}</td>


                                   
                
                                </tr>
                                    @endforeach
                              

                                
                              </tbody>
                
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    
@endsection