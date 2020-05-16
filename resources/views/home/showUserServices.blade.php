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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <br>
                <div class="">
                <h2 align="center">{{$service->title}}</h2>
                </div>
                <hr>
                
                <div class="card-body">

                    

                                <div class="container">
                                    
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                            <img style="width:100%;height:200px" src="/storage/cover_images/{{$service->cover_image}}">
                                                
                                            <h3>Description:
                                              {{$service->description}}</h3>
                                                


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
                              
                               
                               
                               
                                    

                                </div>
                                </div>

                </div>
            </div>
        </div>
  


  @include('include.footer')

  @include('include.js')

  </body>
</html>