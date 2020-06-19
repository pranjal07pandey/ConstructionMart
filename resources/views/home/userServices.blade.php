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
               <span data-seq>{{__('customlang.Save Up to 25%')}}</span>
                <h2 data-seq>{{__('customlang.New Generation Construction')}}</h2>
                <p data-seq></p>
                <a data-seq href="/view-services-all" class="aa-shop-now-btn aa-secondary-btn">{{__('customlang.ORDER SERVICE')}}</a>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/construction.jpg" alt="Wristwatch slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>{{__('customlang.Save Up to 35%')}}</span>
                <h2 data-seq>{{__('customlang.Building Construction')}}</h2>
                <p data-seq></p>
                <a data-seq href="/view-services-all" class="aa-shop-now-btn aa-secondary-btn">{{__('customlang.ORDER SERVICE')}}</a>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/livingroom.jpg" alt="Women Jeans slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>{{__('customlang.Save Up to 45%')}}</span>
                <h2 data-seq>{{__('customlang.Interior Design')}}</h2>
                <p data-seq>.</p>
                <a data-seq href="/view-services-all" class="aa-shop-now-btn aa-secondary-btn">{{__('customlang.ORDER SERVICE')}}</a>
              </div>
            </li>
            <!-- single slide item -->           
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/plumbing.jpg" alt="Shoes slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>{{__('customlang.Save Up to 25%')}}</span>
              <h2 data-seq>{{__('customlang.Plumbing Problem')}}</h2>
                <p data-seq></p>
                <a data-seq href="/view-services-all" class="aa-shop-now-btn aa-secondary-btn">{{__('customlang.ORDER SERVICE')}}</a>
              </div>
            </li>


            <!-- single slide item -->  
             <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('frontEnd') }}/img/slider/water-leakage.jpg" alt="Male Female slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>{{__('customlang.Save Up to 15%')}}</span>
                <h2 data-seq>{{__('customlang.Water Leakage Problem')}}</h2>
                <p data-seq></p>
                <a data-seq href="/view-services-all" class="aa-shop-now-btn aa-secondary-btn">{{__('customlang.ORDER SERVICE')}}</a>
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
                                              
                          <a class="aa-product-img" href="/view-services/{{$service->id}}"><img style="width:100%;height:250px" src="{{ URL::asset('uploads/services/'.$service->cover_image)}}"></a>
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