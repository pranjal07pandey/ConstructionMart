

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Construction Mart</title>
    
    @include('include.css')
 
    <style>
      .col-md-6{
        background-color:  #f2f2f2; 
        margin: 1%;
        padding: 1%;

      }
      .col-md-5{
        background-color: #f1f2f4 ; 
        margin: 1%;
        padding: 1%;



      }
      </style>

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
    
  <section id="aa-product">
        <br>
        {{-- <h2 align = "center">{{__('customlang.Order service')}}</h2> --}}
       
    {{-- <div class="jumbotron"> --}}
    <form action="{{url('final/order/product')}}" method="POST" >
  @csrf
    <div class="row">
        <div class="col-md-6">

        <h2>{{__('customlang.Billing Address')}}</h2>



          @foreach((array)$product_id as $id)
            <input type="hidden" name="id[]" value="{{$id}}">
          @endforeach 

        <div class="form-group">
          <label><i class="fa fa-user"></i> {{__('customlang.Name')}} </label>                        
          <input type="text" placeholder="Enter Your Name" class="form-control" name="name" value="{{Auth::user()->name}}" required>
        </div>

        <div class="form-group"> 
          <label><i class="fa fa-phone"></i> {{__('customlang.Phone')}} </label>                        
          <input type="text" placeholder="your phone number" class="form-control" name="phoneNumber" value="{{Auth::user()->phone}}" required>
        </div>

        <div class="form-group"> 
          <label><i class="fa fa-institution"></i> {{__('customlang.Location')}} </label>                        
          <input type="text" placeholder="enter your location" class="form-control" name="location" required>
        </div>
      
      
        <div class="form-group"> 
          <label><i class="fa fa-envelope"></i> {{__('customlang.Email')}}</label>                        
          <input type="email" placeholder="Email, if any" class="form-control" name="email" value="{{Auth::user()->email}}">
        </div>
             

<br>

      <input type="submit" class="btn btn-primary" value="{{__('customlang.order')}}">

        </div>

        <div class="container">
          <div class="row">

        <div class="col-md-5">

          <h2 align = "center">{{__('customlang.Order Details')}}</h2>
           
          <div class="form-group">

            <label><i class="fa fa-work"></i> {{__('Ordered products')}} </label>
          @foreach($products as $data) 
          <input type="hidden" name="quantity[]" value="{{$data->quantity}}">     
          <input type="hidden" name="price[]" value="{{$data->price}}">
          <option type="text"  class="form-control" name="service">{{$data->name}}</option>@endforeach
          </div>
          <div class="form-group">
            <label><i class="fa fa-work"></i> {{__('Total Quantity Ordered')}} </label>                      
          <option type="text"  class="form-control" name="service">{{$totalQuantity}}</option>
          </div>
          <div class="form-group">
            <label><i class="fa fa-work"></i> {{__('Total Price')}} </label>                      
          <option type="text"  class="form-control" name="service">Rs {{$totalPrice}}</option>
          </div>
        </div>
          </div>

        </div>

</div>
  </form>

  </section>
  </div>
<br>
<br>
 
  </div>

  
  </div>
  <div class="container">

  <h1 align="center">{{('You may like other products as well')}}</h1>
    <hr>

    <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner">

              <!-- start prduct navigation -->
             
              <div class="tab-content">
                <!-- Start men product category -->
                <div class="tab-pane fade in active" id="men">
                  <ul class="aa-product-catg">
                    <!-- start single product item -->
                      @foreach ($prod as $datas)
                    <li>
                    <figure>
                            <a class="aa-product-img" href="/view-products/{{$datas->id}}"><img src="{{ URL::asset('uploads/products/'.$datas->image)}}"style="width: 100%; height: 250px" alt="polo shirt img" ></a>
                              <a class="aa-add-card-btn"href="{{url('add/to/cart/'. $datas->id)}}"><span class="fa fa-shopping-cart"></span>Order Now</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#">{{$datas->product_name}}</a></h4>
                              <span class="aa-product-price">Rs {{$datas->price}} per {{$datas->unit}}</span>
                            </figcaption>
                          </figure>       
                    </li>
                    @endforeach
                   
                  </ul>
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