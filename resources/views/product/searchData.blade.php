
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
@include('include.header')
<br>
    <h1 align="center">Search Result</h1>
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
                      @foreach ($prodDetails as $datas)
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
              <div class="tab-content">
                <!-- Start men product category -->
                <div class="tab-pane fade in active" id="men">
                  <ul class="aa-product-catg">
                    <!-- start single product item -->
                      @foreach ($serviceData as $datas)
                    <li>
                    <figure>
                            <a class="aa-product-img" href="/view-services/{{$datas->id}}"><img src="{{ URL::asset('uploads/services/'.$datas->cover_image)}}"style="width: 100%; height: 250px" alt="polo shirt img" ></a>
                              <a class="aa-add-card-btn"href="{{url('add/to/cart/'. $datas->id)}}"><span class="fa fa-shopping-cart"></span>Order Now</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#">{{$datas->title}}</a></h4>
                              
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