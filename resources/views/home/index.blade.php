<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Service N Material</title>

    <link rel="icon" href="{{ asset('frontEnd') }}/img/title/logo.png" type="image/icon type">
    
    @include('include.css')
    <link rel="manifest" href="manifest.json">
 

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

  {{-- <div class="container"> --}}

  
    <section id="aa-slider">
<br>
      <br>
  
    <div class="container">
      {{-- <h2></h2>   --}}
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
          <li data-target="#myCarousel" data-slide-to="4"></li>
          <li data-target="#myCarousel" data-slide-to="5"></li>
        </ol>
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner">

          <div class="item active">
            <img src="{{ asset('frontEnd') }}/img/slider/cornice.png" alt="Los Angeles" style="width:100%; height:416px">
          </div>
    
          <div class="item">
            <img src="{{ asset('frontEnd') }}/img/slider/corner.png" alt="Chicago" style="width:100%; height:416px">
          </div>
        
         

        <div class="item">
          <img src="{{ asset('frontEnd') }}/img/slider/nails.png" alt="New york" style="width:100%; height:416px">
        </div>
      

      <div class="item">
        <img src="{{ asset('frontEnd') }}/img/slider/gypsum.png" alt="New york" style="width:100%; height:416px">
      </div>
    

    <div class="item">
      <img src="{{ asset('frontEnd') }}/img/slider/board.png" alt="New york" style="width:100%; height:416px">
    </div>
  

  <div class="item">
    <img src="{{ asset('frontEnd') }}/img/slider/abc.png" alt="New york" style="width:100%; height:416px">
  </div>


      </div>
      
  
    
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    </section>
    
    

  <!-- Start slider -->
  {{-- <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/cornice.png" alt="Men slide img" style="width: 100%" height="576px" />
              </div>
              <div class="seq-title">
              <span data-seq>{{__('customlang.Save Up to 25%')}}</span>
                <h2 data-seq>{{__('customlang.Cornice')}}</h2>
                <p data-seq></p>
                <a data-seq href="other/products" class="aa-shop-now-btn aa-secondary-btn">{{__('customlang.SHOP NOW')}}</a>
              </div>
            </li>
            <!-- single slide item -->
            
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/corner.png" alt="Women Jeans slide img" style="width: 100%" height="576px" />
              </div>
              <div class="seq-title">
                <span data-seq>{{__('customlang.Save Up to 35%')}}</span>
                <h2 data-seq>{{__('customlang.Corner')}}</h2>
                <p data-seq></p>
                <a data-seq href="other/products" class="aa-shop-now-btn aa-secondary-btn">{{__('customlang.SHOP NOW')}}</a>
              </div>
            </li>
            <!-- single slide item -->           
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/nails.png" alt="Shoes slide img" style="width: 100%" height="576px" />
              </div>
              <div class="seq-title">
                <span data-seq>{{__('customlang.Save Up to 25%')}}</span>
                <h2 data-seq>{{__('customlang.Nails')}}</h2>
                <p data-seq></p>
                <a data-seq href="other/products" class="aa-shop-now-btn aa-secondary-btn">{{__('customlang.SHOP NOW')}}</a>
              </div>
            </li>

            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/gypsum.png" alt="Shoes slide img" style="width: 100%" height="576px" />
              </div>
              <div class="seq-title">
                <span data-seq>{{__('customlang.Save Up to 25%')}}</span>
                <h2 data-seq>{{__('customlang.Gypsum')}}</h2>
                <p data-seq>.</p>
                <a data-seq href="other/products" class="aa-shop-now-btn aa-secondary-btn">{{__('customlang.SHOP NOW')}}</a>
              </div>
            </li>

            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/board.png" alt="Shoes slide img" style="width: 100%" height="576px" />
              </div>
              <div class="seq-title">
                <span data-seq>{{__('customlang.Save Up to 25%')}}</span>
                <h2 data-seq>{{__('customlang.Boards')}}</h2>
                <p data-seq></p>
                <a data-seq href="other/products" class="aa-shop-now-btn aa-secondary-btn">{{__('customlang.SHOP NOW')}}</a>
              </div>
            </li>

            <!-- single slide item -->  
             <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/abc.png" alt="Male Female slide img" style="width: 100%" height="576px" />
              </div>
              <div class="seq-title">
                <span data-seq>{{__('customlang.Save Up to 15%')}}</span>
                <h2 data-seq>{{__('Product')}}</h2>
                <p data-seq></p>
                <a data-seq href="other/products" class="aa-shop-now-btn aa-secondary-btn">{{__('customlang.SHOP NOW')}}</a>
              </div>
            </li> 
            
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/Central.png" alt="Wristwatch slide img" style="width: 100%" height="576px" />
              </div>
              <div class="seq-title">
                <span data-seq>{{__('customlang.Save Up to 40%')}}</span>
                <h2 data-seq>{{__('customlang.Central Panel')}}</h2>
                <p data-seq>.</p>
                <a data-seq href="other/products" class="aa-shop-now-btn aa-secondary-btn">{{__('customlang.SHOP NOW')}}</a>
              </div>
            </li>
            
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section> --}}

  {{-- </div> --}}
  <!-- / slider -->

  <section id="aa-product">
    <h1 align="center">{{__('customlang.Our Products')}}</h1>
    <hr>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="#men" data-toggle="tab">{{__('customlang.Recently Added')}}</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->

                    <div class="tab-pane fade in active" id="men">
                      
                      <ul class="aa-product-catg">
                      <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        @foreach($products as $datas)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="/view-products/{{$datas->id}}"><img src="{{ URL::asset('uploads/products/'.$datas->image)}}"style="width: 100%; height: 250px" alt="polo shirt img" ></a>
                              <a class="aa-add-card-btn"href="{{url('add/to/cart/'. $datas->id)}}"><span class="fa fa-shopping-cart"></span>Add To  Cart</a>
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
                    </div>  
                      </ul>
                      
                      <a class="aa-browse-btn" href="other/products">{{__('customlang.Browse all Product')}} <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / men product category -->
                    
 
                
                 
                  </div>
                  <!-- quick view modal -->                  
                  <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">                      
                        <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <div class="row">
                            <!-- Modal view slider -->
                            <div class="col-md-6 col-sm-6 col-xs-12">                              
                              <div class="aa-product-view-slider">                                
                                <div class="simpleLens-gallery-container" id="demo-1">
                                  <div class="simpleLens-container">
                                      <div class="simpleLens-big-image-container">
                                          <a class="simpleLens-lens-image" data-lens-image="{{ asset('frontEnd') }}/img/view-slider/large/polo-shirt-1.png">
                                              <img src="{{ asset('frontEnd') }}/img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                          </a>
                                      </div>
                                  </div>
                                  <div class="simpleLens-thumbnails-container">
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="{{ asset('frontEnd') }}/img/view-slider/large/polo-shirt-1.png"
                                         data-big-image="{{ asset('frontEnd') }}/img/view-slider/medium/polo-shirt-1.png">
                                          <img src="{{ asset('frontEnd') }}/img/view-slider/thumbnail/polo-shirt-1.png">
                                      </a>                                    
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="{{ asset('frontEnd') }}/img/view-slider/large/polo-shirt-3.png"
                                         data-big-image="{{ asset('frontEnd') }}/img/view-slider/medium/polo-shirt-3.png">
                                          <img src="{{ asset('frontEnd') }}/img/view-slider/thumbnail/polo-shirt-3.png">
                                      </a>

                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="{{ asset('frontEnd') }}/img/view-slider/large/polo-shirt-4.png"
                                         data-big-image="{{ asset('frontEnd') }}/img/view-slider/medium/polo-shirt-4.png">
                                          <img src="{{ asset('frontEnd') }}/img/view-slider/thumbnail/polo-shirt-4.png">
                                      </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal view content -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="aa-product-view-content">
                                <h3>T-Shirt</h3>
                                <div class="aa-price-block">
                                  <span class="aa-product-view-price">$34.99</span>
                                  <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                                <h4>Size</h4>
                                <div class="aa-prod-view-size">
                                  <a href="#">S</a>
                                  <a href="#">M</a>
                                  <a href="#">L</a>
                                  <a href="#">XL</a>
                                </div>
                                <div class="aa-prod-quantity">
                                  <form action="">
                                    <select name="">
                                      <option value="0" selected="1">1</option>
                                      <option value="1">2</option>
                                      <option value="2">3</option>
                                      <option value="3">4</option>
                                      <option value="4">5</option>
                                      <option value="5">6</option>
                                    </select>
                                  </form>
                                  <p class="aa-prod-category">
                                    Category: <a href="#">Polo T-Shirt</a>
                                  </p>
                                </div>
                                <div class="aa-prod-view-bottom">
                                  <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                  <a href="#" class="aa-add-to-cart-btn">View Details</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>                        
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- / quick view modal -->              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>{{__('customlang.AFFORDABLE SHIPPING')}}</h4>
                <P>{{__('customlang.We provide an affordable shipping all over Kathmandu valley*')}}</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
              <h4>{{__('customlang.NO MIDDLEMAN IN BETWEEN')}}</h4>
              <P>{{__('customlang.You get to contact directly with the dealers. No middleman in between us!')}}</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>{{__('customlang.SUPPORT 24/7')}}</h4>
                <P>{{__('customlang.Our customer support are always there for you in case of any queries.')}}</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
  <section id="aa-testimonial">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-testimonial-area">
            <ul class="aa-testimonial-slider">
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{ asset('frontEnd') }}/img/testimonial-img-2.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Content marketing is more than a buzzword. It is the hottest trend in marketing because it is the biggest gap between what buyers want and brands produce.</p>
                  <div class="aa-testimonial-info">
                    <p>Mandil Thapa</p>
                    <span>Manager</span>
                    <a href="#">Service N Material</a>
                  </div>
                </div>
              </li>
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{ asset('frontEnd') }}/img/testimonial-img-1.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>You can never go wrong by investing in communities and the human beings within them.</p>
                  <div class="aa-testimonial-info">
                    <p>Mandil Thapa</p>
                    <span>CEO</span>
                    <a href="#">Service N Material</a>
                  </div>
                </div>
              </li>
               <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{ asset('frontEnd') }}/img/testimonial-img-3.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Our jobs as marketers are to understand how the customer wants to buy and help them to do so</p>
                  <div class="aa-testimonial-info">
                    <p>Mandil Thapa</p>
                    <span>COO</span>
                    <a href="#">Service N Material</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Testimonial -->




  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">

      

      <div class="row">
        
        <div class="col-md-12">

         
          <div class="aa-subscribe-area">

            <div class="card-body">
              @if (session('success'))
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ session('success') }}
                  </div>
              @endif
          </div>

            <h3>{{__('customlang.Subscribe our newsletter')}} </h3>
            <p>{{__('customlang.Subscribe to Never miss any updates')}}</p>
            <form action="/subscribe-newsletter" method="POST" class="aa-subscribe-form">
              @csrf
              <input type="email" name="email" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

  @include('include.footer')

  
  


@include('include.js')

  

  </body>
</html>