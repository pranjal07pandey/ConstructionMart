

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

<div class="container">
    
  <section id="aa-product">
    {{-- <div class="aa-contact-top"> --}}
        <br>
        <h2 align = "center">{{__('customlang.Order service')}}</h2>
        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quos.</p> --}}
      {{-- </div>  --}}
    <div class="jumbotron">
    <form class="comments-form contact-form" action="/order-categories/{{$category->id}}" method="POST">
  @csrf
    <div class="row">
        <div class="col-md-12">

          <div class="form-group">
            <label>{{__('customlang.Ordered service')}} </label>                        
          <input type="text"  class="form-control" name="service" value="{{$category->cat_title}}">
          </div>

          
      
        <div class="form-group">
          <label>{{__('customlang.Name')}} </label>                        
          <input type="text" placeholder="Enter Your Name" class="form-control" name="name" required>
        </div>

        <div class="form-group"> 
          <label>{{__('customlang.Phone')}} </label>                        
          <input type="text" placeholder="your phone number" class="form-control" name="phone" required>
        </div>

        <div class="form-group"> 
          <label>{{__('customlang.Location')}} </label>                        
          <input type="text" placeholder="enter your location" class="form-control" name="location" required>
        </div>
      
      
        <div class="form-group"> 
          <label>{{__('customlang.Email')}}</label>                        
          <input type="email" placeholder="Email, if any" class="form-control" name="email">
        </div>
             
     
        <div class="form-group">
          <label>{{__('customlang.State your problem')}} </label>                        
        <textarea class="form-control" rows="3" placeholder="Message" name="message"></textarea>
        </div>

        <div class="form-group">
          <label>{{__('customlang.insert image')}} </label> 
          <input type="file" name="image">                       
        
        </div>

<br>

      <input type="submit" class="btn btn-primary" value="{{__('customlang.order')}}">

        </div>

</div>
  </form>
</div>

  </section>
  </div>

  <div class="container">

  <h1 align="center">{{__('customlang.You may like other services as well')}}</h1>
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

                    {{-- @if(count($services)>0) --}}

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
                    {{-- @else --}}
                    {{-- <p>No services found</p> --}}
                    {{-- @endif --}}
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