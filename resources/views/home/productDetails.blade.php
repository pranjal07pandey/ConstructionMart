<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Service N Material</title>
    <link rel="icon" href="{{ asset('frontEnd') }}/img/title/logo.png" type="image/icon type">

    
    @include('include.css')
 

  </head>
  <body> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  @include('include.header')

  

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <br>
                <div class="">
                <h2 align="center">{{__('customlang.Product Details')}}</h2>
                </div>
                <hr>
                
                <div class="card-body">

                    

                                <div class="container">
                                    
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                            <img style="width:100%;height:250px" src="{{ URL::asset('uploads/products/'.$prodDetails->image)}}">

                                             <a class="aa-add-card-btn"href="{{url('add/to/cart/'. $prodDetails->id)}}"><span class="fa fa-shopping-cart"></span>Add to cart</a>
                                                

                                            </div>
                                            <div class="col-md-4 col-sm-4" style="margin-left: 3%;">
                                               <p><b>Uploaded By:&nbsp&nbsp </b>{{$prodDetails->user->name}}</p>
                                            <p><b>Product Name:&nbsp&nbsp </b>{{$prodDetails->product_name}}</p>
                                            
                                            <p><b>Price: &nbsp&nbsp</b>Rs {{$prodDetails->price}} per {{$prodDetails->unit}}</p>
                                            <p></p>
                                            @if($prodDetails->delivery_facility)
                                            <p><b>{{__('customlang.Delivery Facility: Yes')}}</b></p>
                                            <p><b>{{__('customlang.Delivery Charge')}}: {{$prodDetails->delivery_charges}}</b></p>
                                              @else
                                                <p><b>{{__('customlang.Delivery Facility: Sorry there is no delivery facility')}}</b></p>
                                              @endif
                                              <p><b>Features:</b></p>
                                              <p><b>
                                                <p><b>Product Features: &nbsp&nbsp</b>{{$prodDetails->features}}</p>
                                              </b></p>


                                            </div>


                                
                                    </div>
                                    </div>


                                </div>
                              
                               
                               
                               
                                    

                                </div>
                                </div>

                </div>
            </div>
        </div>
  


  @include('include.footer')

  @include('include.js')

  </body>
</html>