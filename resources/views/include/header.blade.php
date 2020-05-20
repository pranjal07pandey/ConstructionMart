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
                  <li><a href="/login">Login</a></li>
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
                    <a class="aa-cart-link" href="{{url('show/cart/products')}}">
                        <span class="fa fa-shopping-basket"></span>
                        <span class="aa-cart-title">SHOPPING CART</span>
                        <span class="aa-cart-notify">2</span>
                    </a>
                    
                </div>
                <!-- / cart box -->

              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name=""  placeholder="Search here ex. 'gypsum' ">
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
              {{-- <li><a href="index.html">Home</a></li> --}}
              <li><a href="/product">Products<span class="caret"></span></a>
                <ul class="dropdown-menu"> 
                @foreach($shareData as $datas)              
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
                  <li><a href="/view-services">View All</a></li>

                </ul>
              {{-- <li><a href="#">Gallery</a></li> --}}

              {{-- <li><a href="#">About Us</a></li>
               --}}
              <li><a href="/contact">Contact</a></li>

            
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->