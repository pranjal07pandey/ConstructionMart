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


<section id="aa-product">

  {{-- <div class="container"> --}}
    <h1 align="center">{{__('customlang.All our Services')}}</h1>
    {{-- </div> --}}

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
</section>


  


  @include('include.footer')

  @include('include.js')

  </body>
</html>