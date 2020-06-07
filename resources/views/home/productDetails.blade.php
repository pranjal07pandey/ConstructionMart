<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Construction Mart</title>
    
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
                <h2 align="center">{{'Product Details'}}</h2>
                </div>
                <hr>
                
                <div class="card-body">

                    

                                <div class="container">
                                    
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                            <img style="width:100%;height:200px" src="{{ URL::asset('uploads/products/'.$prodDetails->image)}}">
                                                

                                            </div>
                                            <div class="col-md-4 col-sm-4" style="margin-left: 3%;">
                                            <p><b>{{$prodDetails->product_name}}</b></p>
                                            <p><b>Rs {{$prodDetails->price}}</b></p>
                                            @if($prodDetails->delivery_facility)
                                              <p><b>Delivery Facility: Yes</b></p>
                                              <p><b>Delivery Charge: {{$prodDetails->delivery_charges}}</b></p>
                                              @else
                                                <p><b>Delivery Facility: Sorry there is no delivery facility</b></p>
                                              @endif
                                              <p><b>
                                              {{$prodDetails->features}}</b></p>

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