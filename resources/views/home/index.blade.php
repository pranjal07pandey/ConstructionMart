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


  <!--Header Starts -->

<!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-inr"></i>NPR
                    </a>

                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>+977-9819173663</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
<!--                  <li><a href="account.html">My Account</a></li>-->
<!--                  <li class="hidden-xs"><a href="wishlist.html">Wishlist</a></li>-->
                  <li class="hidden-xs"><a href="cart.html">My Cart</a></li>
                  <li class="hidden-xs"><a href="checkout.html">Checkout</a></li>
                  <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  <li class="hidden-xs">Email: abc@gmail.com</li>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="/">
                  <span class="fa fa-home"></span>
                  <p>Construction<strong>Mart</strong> <span>Your Construction Guide</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->

                <!-- cart box -->
                <div class="aa-cartbox">
                    <a class="aa-cart-link" href="#">
                        <span class="fa fa-shopping-basket"></span>
                        <span class="aa-cart-title">SHOPPING CART</span>
                        <span class="aa-cart-notify">2</span>
                    </a>
                    <div class="aa-cartbox-summary">
                        <ul>
                            <li>
                                <a class="aa-cartbox-img" href="#"><img src="{{ asset('frontEnd') }}/img/woman-small-2.jpg" alt="img"></a>
                                <div class="aa-cartbox-info">
                                    <h4><a href="#">Product Name</a></h4>
                                    <p>1 x $250</p>
                                </div>
                                <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                            </li>
                            <li>
                                <a class="aa-cartbox-img" href="#"><img src="{{ asset('frontEnd') }}/img/woman-small-1.jpg" alt="img"></a>
                                <div class="aa-cartbox-info">
                                    <h4><a href="#">Product Name</a></h4>
                                    <p>1 x $250</p>
                                </div>
                                <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                            </li>
                            <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                                <span class="aa-cartbox-total-price">
                        $500
                      </span>
                            </li>
                        </ul>
                        <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>
                    </div>
                </div>
                <!-- / cart box -->

              <!-- search box -->
              <div class="aa-search-box">
                <form action="/search/product" method="POST">
                  @csrf
                  <input type="text" name="search"  placeholder="Search here ex. 'gypsum' ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>

  
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.html">Home</a></li>
              <li><a href="#">Products<span class="caret"></span></a>
                <ul class="dropdown-menu"> 
                @foreach($data as $datas)              
                  <li><a href="{{url('show/cat/products/'.$datas->id)}}">{{$datas->category_name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    @foreach($datas->subCategories as $subCat)                
                    <li><a href="{{url('show/sub/cat/products/'.$subCat->id)}}">{{$subCat->sub_category_name}}</a></li>
                    @endforeach
                    </ul>
                  </li>
                @endforeach          
                  <li><a href="{{url('other/products')}}">Others</a>
                  </li>
                </ul>
              </li>
              <li><a href="#">Services<span class="caret"></span></a>
                <ul class="dropdown-menu">  
                  <li><a href="#">Construction<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Building</a></li>
                      <li><a href="#">Houses</a></li>
                      <li><a href="#">New Generation</a></li>
                      <li><a href="#">Structural <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Iron</a></li>
                          <li><a href="#">Steel</a></li>
                        </ul>
                      <li><a href="#">Traditional <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Nepali</a></li>
                        </ul>
                      </li>

                      <li><a href="#">RCC <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Regular</a></li>
                          <li><a href="#">Kinetic</a></li>
                        </ul>
                      </li>

                    </ul>
                  </li>
                  <li><a href="#">Plumbing</a></li>
                  <li><a href="#">Curtains</a></li>
                  <li><a href="#">Steel</a></li>
                  <li><a href="#">Interiors <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                      <li><a href="#">Wall Panneling</a></li>
                      <li><a href="#">Wall Paper</a></li>
                      <li><a href="#">Wall color</a></li>
                      <li><a href="#">Wall art</a></li>

                    </ul>

                  </li>
                  <li><a href="#">Wall Seepage</a></li>
                </ul>
              <li><a href="#">Gallery</a></li>

              <li><a href="#">About Us</a></li>
              <li><a href="/contact">Contact</a></li>

            
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->

  <!-- Header Ends -->

  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/building.jpg" alt="Men slide img" />
              </div>
              <div class="seq-title">
               <span data-seq>Save Up to 75%</span>
                <h2 data-seq>New Generation Construction</h2>
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/construction.jpg" alt="Wristwatch slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 40%</span>
                <h2 data-seq>Building Construction</h2>
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/livingroom.jpg" alt="Women Jeans slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 75%</span>
                <h2 data-seq>Interior Design</h2>
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->           
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/plumbing.jpg" alt="Shoes slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 75%</span>
                <h2 data-seq>Plumbing Problem</h2>
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>

            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/parquett.jpg" alt="Shoes slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 75%</span>
                <h2 data-seq>Parqueting</h2>
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>

            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/curtains.jpg" alt="Shoes slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 75%</span>
                <h2 data-seq>Curtains</h2>
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>

            <!-- single slide item -->  
             <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/water-leakage.jpg" alt="Male Female slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 50%</span>
                <h2 data-seq>Water Leakage Problem</h2>
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
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
  </section>
  <!-- / slider -->

  <section id="aa-product">
    <h1 align="center">Our Products</h1>
    <hr>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="#men" data-toggle="tab">Recently Added</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="{{ asset('frontEnd') }}/img/products/csection.jpg" style="width: 250px; height: 300px" alt="polo shirt img" ></a>
                              <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Order Now</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#">C-Section</a></h4>
                              <span class="aa-product-price">Rs. 140/pc</span>
                            </figcaption>
                          </figure>                        
<!--                          -->
                          <!-- product badge -->
<!--                          <span class="aa-badge aa-sale" href="#">SALE!</span>-->
                        </li>
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="{{ asset('frontEnd') }}/img/products/stud.jpg" style="width: 250px; height: 300px" alt="polo shirt img"></a>
                                <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Order Now</a>
                             <figcaption>
                              <h4 class="aa-product-title"><a href="#">Stud</a></h4>
                              <span class="aa-product-price">Rs. 180/pc</span>
                            </figcaption>
                          </figure>                         

                          <!-- product badge -->

                        </li>
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="{{ asset('frontEnd') }}/img/products/gypsumboard.jpg" style="width: 250px; height: 300px" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Order Now</a>
                             <figcaption>
                              <h4 class="aa-product-title"><a href="#">Gypsum Board</a></h4>
                              <span class="aa-product-price">Rs. 32/sq.ft</span>
                            </figcaption>
                          </figure>                         

                        </li>
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="{{ asset('frontEnd') }}/img/products/any.jpg" style="width: 250px; height: 300px" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Order Now</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="#">Cement Board</a></h4>
                              <span class="aa-product-price">Rs. 34/sq.ft</span>
                            </figcaption>
                          </figure>                          

                          <!-- product badge -->
<!--                          <span class="aa-badge aa-hot" href="#">HOT!</span>-->
                        </li>
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="{{ asset('frontEnd') }}/img/products/cornice.jpg" style="width: 250px; height: 300px" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Order Now</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="#">Cornice</a></h4>
                              <span class="aa-product-price">Rs. 170/pc</span>
                            </figcaption>
                          </figure>                          

                        </li>
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="{{ asset('frontEnd') }}/img/products/plug.jpg" style="width: 250px; height: 300px" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Order Now</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="#">Rawl Plug</a></h4>
                              <span class="aa-product-price">Rs. 11/pc</span>
                            </figcaption>
                          </figure>                          

                        </li>
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="{{ asset('frontEnd') }}/img/products/screw.jpg" style="width: 250px; height: 300px" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Order Now</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="#">Screw</a></h4>
                              <span class="aa-product-price">Rs. 350/box</span>
                            </figcaption>
                          </figure>                          

                          <!-- product badge -->
<!--                          <span class="aa-badge aa-sale" href="#">SALE!</span>-->
                        </li>
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="{{ asset('frontEnd') }}/img/products/inter.jpg" style="width: 250px; height: 300px" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Order Now</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="#">Inter</a></h4>
                              <span class="aa-product-price">Rs. 110/pc</span>
                            </figcaption>
                          </figure>                         

                          <!-- product badge -->

                        </li>                        
                      </ul>
                      <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
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
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
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
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Allison</p>
                    <span>Designer</span>
                    <a href="#">Dribble.com</a>
                  </div>
                </div>
              </li>
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{ asset('frontEnd') }}/img/testimonial-img-1.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>KEVIN MEYER</p>
                    <span>CEO</span>
                    <a href="#">Alphabet</a>
                  </div>
                </div>
              </li>
               <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{ asset('frontEnd') }}/img/testimonial-img-3.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Luner</p>
                    <span>COO</span>
                    <a href="#">Kinatic Solution</a>
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
            <h3>Subscribe our newsletter </h3>
            <p>Subscribe to Never miss any updates</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

  @include('include.footer')
  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="#">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    
  
@include('include.js')

  </body>
</html>