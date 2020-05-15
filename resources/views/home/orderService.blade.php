

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
  @csrf
    <div class="row">
        <div class="col-md-12">

          <div class="form-group">
            <label>Ordered Service: </label>                        
          <input type="text"  class="form-control" name="service" value="{{$category->cat_title}}">
          </div>
      
        <div class="form-group">
          <label>Name: </label>                        
          <input type="text" placeholder="Enter Your Name" class="form-control" name="name" required>
        </div>

        <div class="form-group"> 
          <label>Phone: </label>                        
          <input type="email" placeholder="your phone number" class="form-control" name="phone" required>
        </div>
      
      
        <div class="form-group"> 
          <label>Email: </label>                        
          <input type="email" placeholder="Email, if any" class="form-control" name="email">
        </div>
             
     
        <div class="form-group">
          <label>State your prblem: </label>                        
        <textarea class="form-control" rows="3" placeholder="Message" name="message"></textarea>
        </div>

        <div class="form-group">
          <label>insert image: </label> 
          <input type="file" name="image">                       
        
        </div>

<br>

        <input type="submit" class="btn btn-primary" value="Order">

        </div>

</div>
  </form>
</div>

  </div>



  @include('include.footer')
  @include('include.js')

</body>
</html>