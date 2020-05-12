

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
    
    <div class="aa-contact-top">
        <br>
        <h2 align = "center">Order service</h2>
        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quos.</p> --}}
      </div>
    <div class="jumbotron">
<form class="comments-form contact-form" action="">
    <div class="row">
        <div class="col-md-12">
      
        <div class="form-group">                        
          <input type="text" placeholder="Your Name" class="form-control">
        </div>
      
      
        <div class="form-group">                        
          <input type="email" placeholder="Email" class="form-control">
        </div>
       
        <div class="form-group">                        
          <input type="text" placeholder="Subject" class="form-control">
        </div>
      
      
        <div class="form-group">                        
          <input type="text" placeholder="Company" class="form-control">
        </div>
      
                     
     
        <div class="form-group">                        
        <textarea class="form-control" rows="3" placeholder="Message"></textarea>
        </div>
    <button class="aa-secondary-btn">Send</button>

        </div>

</div>
  </form>
</div>

  </div>



  @include('include.footer')
  @include('include.js')

</body>
</html>