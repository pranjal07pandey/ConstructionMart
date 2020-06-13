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
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      {{__('customlang.भाषा')}}
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="lang/np"><img src="{{ asset('frontEnd') }}/img/flag/nepal.png" alt=""> नेपाली</a></li>
                      <li><a href="lang/en"><img src="{{ asset('frontEnd') }}/img/flag/english.jpg" alt=""> ENG</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>00-62-658-658</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  @if (Auth::user())

                  <li>
                    <a href="/home">
                        <span class="fa fa-home"></span>
                        <span class="aa-cart-title">{{__('customlang.Dashboard')}}</span>
                    </a>
                  </li>
                  <li class="hidden-xs"><a href="/show/cart/products">{{__('customlang.My Cart')}}</a></li>


                      <li class="hidden-xs">{{__('customlang.Hi')}}, {{Auth::user()->name}}!</li>
                      

                      @else
                          <li><a href="/home">{{__('customlang.My Account')}}</a></li>
                          {{-- <li class="hidden-xs"><a href="wishlist.html">{{__('customlang.Wishlist')}}</a></li> --}}
                          <li class="hidden-xs"><a href="/show/cart/products">{{__('customlang.My Cart')}}</a></li>
                          <li>
                            <a href="/login">
                                <span class="glyphicon glyphicon-log-in"></span>
                                <span class="aa-cart-title">{{__('customlang.Login')}}</span>
                            </a>
                          </li>

                      
                  @endif
             
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
                <p>Service<strong>N</strong>Material <span>{{__('customlang.Your Construction Guide')}}</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>



                <!-- cart box -->
                <div class="aa-cartbox">
                    <a class="aa-cart-link" href="{{url('show/cart/products')}}">
                        <span class="fa fa-shopping-basket"></span>
                        <span class="aa-cart-title">{{__('customlang.MY CART')}}</span>
                         <span class="aa-cart-notify">{{Cart::getContent()->count()}}</span> 
                    </a>
                    
                </div>

                
                

               
                
                <!-- / cart box -->
               
              <!-- search box -->
              <div class="aa-search-box">
                <form action="{{url('search/product')}}">
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
              {{-- <li><a href="index.html">Home</a></li> --}}
              <li class="{{ '/'== request()->path() ? 'active' :'' }}"><a href="/product">{{__('customlang.Products')}}<span class="caret"></span></a>
                <ul class="dropdown-menu {{ '/'== request()->path() ? 'active' :'' }}"> 
                @foreach($shareData as $datas)              
                  <li><a href="{{url('show/cat/products/'.$datas->id)}}">{{$datas->category_name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    @foreach($datas->subCategories as $subCat)                
                    <li><a href="{{url('show/sub/cat/products/'.$subCat->id)}}">{{$subCat->sub_category_name}}</a></li>
                    @endforeach
                    </ul>
                  </li>
                @endforeach          
                  <li><a href="{{url('other/products')}}">View All</a>
                  </li>
                </ul>
              </li>
              <li class="{{ 'view-services'== request()->path() ? 'active' :'' }}"><a href="#">{{__('customlang.Services')}}<span class="caret"></span></a>
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
                  <li><a href="/view-services">Our Services</a></li>

                </ul>
             
              <li class="{{ 'contact'== request()->path() ? 'active' :'' }}"><a href="/contact">{{__('customlang.Contact')}}</a></li>

            
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->