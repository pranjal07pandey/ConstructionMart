
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

    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->

  <!-- END SCROLL TOP BUTTON -->


  @include('include.header')
@include('include.js')
<section id="aa-product">
    <h1 align="center">Searched Product</h1>
    <hr>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="#men" data-toggle="tab"></a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                       <ul class="aa-product-catg">
                         <div class="tab-pane fade in active" id="men">
                           
                        <!-- start single product item -->
                        @foreach($prodDetails as $datas)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="/view-products/{{$datas->id}}"><img src="{{ URL::asset('uploads/products/'.$datas->image)}}"style="width: 100%; height: 250px" alt="no image" ></a>
                              <a class="aa-add-card-btn"href="{{url('add/to/cart/'. $datas->id)}}"><span class="fa fa-shopping-cart"></span>Order Now</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#">{{$datas->product_name}}</a></h4>
                              <span class="aa-product-price">Rs {{$datas->price}} per {{$datas->unit}}</span>
                            </figcaption>
                          </figure>                        
<!--                          -->
                          <!-- product badge -->
<!--                          <span class="aa-badge aa-sale" href="#">SALE!</span>-->
                        </li>
                        @endforeach
                      </ul>
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                         @foreach($serviceData as $datas)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="/view-services/{{$datas->id}}"><img src="{{ URL::asset('uploads/products/'.$datas->image)}}"style="width: 100%; height: 250px" alt="polo shirt img" ></a>
                              <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Order Now</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#">{{$datas->title}}</a></h4>
                              <span class="aa-product-price">Rs {{$datas->description}}</span>
                            </figcaption>
                          </figure>                        
<!--                          -->
                          <!-- product badge -->
<!--                          <span class="aa-badge aa-sale" href="#">SALE!</span>-->
                        </li>
                        @endforeach
                      </ul>
                      {{ $serviceData->links() }}
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

                  <!-- quick view modal -->                  
               
@include('include.footer')

  </section>
</body>
</html>