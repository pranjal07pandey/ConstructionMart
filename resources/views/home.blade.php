@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 align="center">My Order History</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">Service Order</h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table">
                              <thead class=" text-primary">
                                <th>Service Category</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Email</th>
                                <th>Message</th>

                              </thead>
                
                              <tbody>
                

                                @foreach ($orders as $order)

                                <tr>
                                    <td>{{$order->service}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->location}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->message}}</td>
                                    
                
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
                          <h4 class="card-title">Product Order</h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table">
                              <thead class=" text-primary">
                                <th>Product</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Email</th>
                                <th>Message</th>

                              </thead>
                
                              <tbody>
                

                                

                                <tr>
                                    <td>Cornice</td>
                                    <td>blah</td>
                                    <td>981984</td>
                                    <td>ktm</td>
                                    <td>abc@gmail.com</td>
                                    <td>okay</td>
                                    
                
                                </tr>
                                    
                              

                                
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
