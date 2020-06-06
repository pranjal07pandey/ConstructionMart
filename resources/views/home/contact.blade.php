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


<!-- start contact section -->
<section id="aa-contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-contact-area">
            <div class="aa-contact-top">
              <h2>We are wating to assist you..</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quos.</p>
            </div>
            <!-- contact map -->
            <div class="aa-contact-map">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.3714257064535!2d-86.7550931378034!3d34.66757706940219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8862656f8475892d%3A0xf3b1aee5313c9d4d!2sHuntsville%2C+AL+35813%2C+USA!5e0!3m2!1sen!2sbd!4v1445253385137" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            
            <!-- Contact address -->
            <div class="aa-contact-address">
              <div class="row">
                <div class="col-md-8">
                          <div class="col-md-8">
                            @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                          </div>
                  <div class="aa-contact-address-left">

                    <form class="comments-form contact-form" action="/contact" method="POST">
                      @csrf
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group"> 
                           <label for="name">{{__('customlang.Name')}}</label>                       
                           <input type="text" placeholder="Your Name" class="form-control" name="name">
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group"> 
                          <label for="email">{{__('customlang.Email')}}</label>                       

                           <input type="email" placeholder="if you want.." class="form-control" name="email">
                         </div>
                       </div>
                     </div>
                      <div class="row">
                       <div class="col-md-6">
                         <div class="form-group"> 
                          <label for="subject">{{__('customlang.Subject')}}</label>                       

                           <input type="text" placeholder="your enquiry about?" class="form-control" name="subject">
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group">
                          <label for="phone">{{__('customlang.Phone-Number')}}</label>                       

                           <input type="text" placeholder="your number" class="form-control" name="phone">
                         </div>
                       </div>
                     </div>                  
                      
                     <div class="form-group"> 
                      <label for="msg">{{__('customlang.Your Message')}}</label>                       

                       <textarea class="form-control" rows="3" placeholder="write what you want us to do..." name="msg"></textarea>
                     </div>
                     <button type="submit" class="aa-secondary-btn">{{__('customlang.Send Message')}}</button>
                   </form>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="aa-contact-address-right">
                    <address>
                      <h4>Construction Mart</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum modi dolor facilis! Nihil error, eius.</p>
                      <p><span class="fa fa-home"></span>Tinkune, AL 35813, Nepal</p>
                      <p><span class="fa fa-phone"></span>+ 021.343.7575</p>
                      <p><span class="fa fa-envelope"></span>Email: support@dailyshop.com</p>
                    </address>
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
 