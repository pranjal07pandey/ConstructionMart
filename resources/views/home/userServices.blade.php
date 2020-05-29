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
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">ORDER SERVICE</a>
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
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">ORDER SERVICE</a>
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
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">ORDER SERVICE</a>
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
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">ORDER SERVICE</a>
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
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">ORDER SERVICE</a>
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
  <br>
  <!-- / slider -->



{{-- 
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="">
                <h1 align="center">Our Services</h1>
                </div>
                <hr>
                <br>
                <div class="card-body">

                    @if(count($services)>0)

                                @foreach ($services as $service)
                                <div class="container">
                                    
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <a href="/view-services/{{$service->id}}">
                                            <img style="width:100%;height:200px" src="/storage/cover_images/{{$service->cover_image}}">
                                                
                                                </a>
                                            <h3 align="center"><a href="/view-services/{{$service->id}}">{{$service->title}}</h3>
                                                </a>
                                            </div>

                                            <div class="col-md-4 col-sm-4">
                                            <b>Available Categories: (select to order)</b>

                                            @foreach ($service->serviceCategories as $category)
                                            <ul class="list-group">
                                                <a href="/order-categories/{{$category->id}}" >
                                            <li class= "list-group-item">
                                                {{$category->cat_title}}
                                            </li>
                                        </a>
                                            </ul>
                          
                                            <br>
                                                
                                            @endforeach
                                            </div>
                                
                                    </div>
                                    </div>


                                </div>
                              
                                <br>
                               
                                @endforeach

                                {{$services->links()}}

                                @else
                                <p>No services found</p>
                                    

                                </div>
                                </div>
                                @endif

                </div>
            </div>
        </div>
    </div>
  </div> --}}


  <div class="">
    <h1 align="center">{{__('customlang.Our Services')}}</h1>
    </div>

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

              <div class="tab-content">
                <!-- Start men product category -->
                <div class="tab-pane fade in active" id="men">
                  <ul class="aa-product-catg">
                    <!-- start single product item -->

                    @if(count($services)>0)

                      @foreach ($services as $service)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="/view-services/{{$service->id}}"><img src="/storage/cover_images/{{$service->cover_image}}" style="width: 100%; height: 250px" alt="polo shirt img" ></a>
                          <a class="aa-add-card-btn"href="/view-services/{{$service->id}}"><span class=""></span>{{__('customlang.view details')}}</a>
                          <figcaption>
                          <h3 class="aa-product-title"><a href="/view-services/{{$service->id}}">{{$service->title}}</a></h3>
      
                        </figcaption>
                      </figure> 
                    </li>
                    @endforeach



                    @else
                    <p>{{__('customlang.No services found')}}</p>
                    @endif
                  </ul>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <a class="aa-browse-btn align-right" href="/view-services-all"> {{__('customlang.Browse all Services')}}<span class="fa fa-long-arrow-right"></span></a>
  </div>
  
  <br>



  

  
  


  @include('include.footer')

  @include('include.js')

  </body>
</html>