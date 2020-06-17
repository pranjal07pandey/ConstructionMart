@extends('admin.layouts.master')




@section('title')

Product Index
    
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Our Products</h3>
                        <a href="/product" class="btn btn-primary ">Add new Product</a>
                </div>

                <br>

                    <div class="card-body">
                      {{$prodData}}
                  
                                @if(count($prodData)>0)

                                @foreach ($prodData as $prod)
                                <div class="container">
                                    
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                            <h3>{{$prod->product_name}}</h3>
                                              <a class="aa-product-img" href="#"><img src="{{ URL::asset('uploads/products/'.$prod->image)}}"style="width: 100%; height: 250px" alt="polo shirt img" ></a>

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
                                            <b>Offered By: {{$prod->user->name}}</b><br><p></p>
                                      		</div>
                                    	</div>
                                    	<a href="{{url('edit/product/'.$prod->id)}}" class="btn btn-primary ">Edit</a>
                                      		 <a href="{{url('delete/product/'.$prod->id)}}" class="btn btn-primary ">Delete</a>
                                    </div>


                                </div>
                                <br>
                                <hr>
                                @endforeach

                                {{-- {{$prodData->links()}} --}}

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