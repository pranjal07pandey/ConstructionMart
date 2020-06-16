@extends('admin.layouts.smMaster')

{{-- @if(Auth::check())
    @if (Auth::user()->usertype=='serviceManager')
    @extends('admin.layouts.smMaster')
    @endif
@endif --}}


@section('title')

Product Index
    
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Search Result</h3>
                </div>

                <br>

                    <div class="card-body">
                  
                                @if(count($data)>0 || count($serviceData) > 0)

                                @foreach ($data as $prod)
                                <div class="container">
                                    
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                            <h3>{{$prod->product_name}}</h3>
                                              <a class="aa-product-img" href="#"><img src="{{ URL::asset('uploads/products/'.$prod->image)}}"style="width: 350px; height: 300px" alt="polo shirt img" ></a>

                                            </div>
                                            <div style="width: 50%; margin-left: 10%;margin-top: 7%">
                                      		 <b style="">Features</b><br><p>{{$prod->features}}</p>
                                      		 <b>Price</b><p>Rs {{$prod->price}} per {{$prod->unit}}</p>
                                      		 @if($prod->delivery_facility)
                                      		 	<b>Delivery Facility</b><p>Yes</p>
                                      		 	<b>Delivery Charge</b><p>{{$prod->delivery_charges}}</p>
                                      		 @else
                                      		 	<b>Delivery Facility</b><p>No</p>
                                      		 		<b>Delivery Charge</b><p>{{$prod->delivery_charges}}</p>
                                      		 @endif
                                      		</div>
                                    	</div>
                                    </div>


                                </div>
                                <br>
                                <hr>
                                @endforeach
                                @else
                                <p>No products found</p>
                                    

                                </div>
                                </div>
                                @endif

                	
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    
@endsection