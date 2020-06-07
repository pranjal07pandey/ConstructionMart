<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
    <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    <meta name="robots" content="noindex,follow" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    @include('include.css')


    <style type="text/css">
      
      @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,500);

/**/



.shopping-cart {
  width: 750px;
  height: 423px;
  margin: 80px auto;
  background: #FFFFFF;
  box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
  border-radius: 6px;

  display: flex;
  flex-direction: column;
}

.wishlist {
  width: 750px;
  height: 423px;
  margin: 80px auto;
  background: #FFFFFF;
  box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
  border-radius: 6px;

  display: flex;
  flex-direction: column;
}

.title {
  height: 60px;
  border-bottom: 1px solid #E1E8EE;
  padding: 20px 30px;
  color: #5E6977;
  font-size: 18px;
  font-weight: 400;
}

.item {
  padding: 20px 30px;
  height: 120px;
  display: flex;
}

.item:nth-child(3) {
  border-top:  1px solid #E1E8EE;
  border-bottom:  1px solid #E1E8EE;
}

/* Buttons -  Delete and Like */
.buttons {
  position: relative;
  padding-top: 30px;
  margin-right: 60px;
}

.delete-btn {
  display: inline-block;
  cursor: pointer;
  width: 18px;
  height: 17px;
  background: url("delete-icn.svg") no-repeat center;
  margin-right: 20px;
}

.like-btn {
  position: absolute;
  top: 9px;
  left: 15px;
  display: inline-block;
  background: url('twitter-heart.png');
  width: 60px;
  height: 60px;
  background-size: 2900%;
  background-repeat: no-repeat;
  cursor: pointer;
}

.is-active {
  animation-name: animate;
  animation-duration: .8s;
  animation-iteration-count: 1;
  animation-timing-function: steps(28);
  animation-fill-mode: forwards;
}

@keyframes animate {
  0%   { background-position: left;  }
  50%  { background-position: right; }
  100% { background-position: right; }
}

/* Product Image */
.image {
  margin-right: 50px;
}

/* Product Description */
.description {
  padding-top: 10px;
  margin-right: 60px;
  width: 115px;
}

.description span {
  display: block;
  font-size: 14px;
  color: #43484D;
  font-weight: 400;
}

.description span:first-child {
  margin-bottom: 5px;
}
.description span:last-child {
  font-weight: 300;
  margin-top: 8px;
  color: #86939E;
}

/* Product Quantity */
.quantity {
  padding-top: 20px;
  margin-right: 60px;
}
.quantity input {
  -webkit-appearance: none;
  border: none;
  text-align: center;
  width: 32px;
  font-size: 16px;
  color: #43484D;
  font-weight: 300;
}

button[class*=btn] {
  width: 30px;
  height: 30px;
  background-color: #E1E8EE;
  border-radius: 6px;
  border: none;
  cursor: pointer;
}
.minus-btn img {
  margin-bottom: 3px;
}
.plus-btn img {
  margin-top: 2px;
}
button:focus,
input:focus {
  outline:0;
}

/* Total Price */
.total-price {
  width: 83px;
  padding-top: 27px;
  text-align: center;
  font-size: 16px;
  color: #43484D;
  font-weight: 300;
}

/* Responsive */
@media (max-width: 800px) {
  .shopping-cart {
    width: 100%;
    height: auto;
    overflow: hidden;
  }
  .item {
    height: auto;
    flex-wrap: wrap;
    justify-content: center;
  }
  .image img {
    width: 50%;
  }
  .image,
  .quantity,
  .description {
    width: 100%;
    text-align: center;
    margin: 6px 0;
  }
  .buttons {
    margin-right: 20px;
  }
}
    </style>
  </head>
  <body>

    @include('include.header')
    @include('include.js')

    <div class="shopping-cart">
      <!-- Title -->
      <div class="title">   
      </div>
      <h3>Cart Items</h3>
      @if(count($products) > 0)
      <!-- Product #3 -->
      <form method="post" action="{{url('order/product')}}">
        @csrf
      @foreach($products as $product)
      <input type="hidden" name="id[]" value="{{$product->id}}">
      <input type="hidden" name="product[]" value="{{$product->name}}">
      <div class="item">
        <div class="buttons">
          <a href = "{{url('cart/wishlist/'.$product->id)}}">add to wishlist</a><br><br>
         <a href = "{{url('/delete/cart/product/'.$product->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
        </div>

        <div class="image">
          <img src="{{ URL::asset('uploads/products/'.$product->image)}}" style="width: 110px; height: 80px" alt="{{$product->image}}">
        </div>

        <div class="description">
          <span>{{$product->name}}</span>
          <span id = "qty{{$product->id}}">Quantity: {{$product->quantity}}</span>
          <span>Rs {{$product->price}}</span>
          <input type="hidden" name="price[]" id="price{{$product->id}}" value=" {{$product->price}}">
        </div>

        <div class="quantity">

 
          <input type="number" name="quantity[]" value="{{$product->quantity}}" id = "totalQuantity{{$product->id}}">
        
        </div>

        <div class="total-price" id = "totalPrice{{$product->id}}">{{$product->price}}</div>
      </div>
      @endforeach
      <div style="width:100%">
        <h3 id = "total"style=" float: right;margin-right: 10%">Total &nbsp&nbsp&nbsp&nbsp&nbsp Rs </h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="width: 30%;height: 40%;float: center;margin-top: 12%;margin-left: 35%">Checkout </button>
      </div>     
      </div>
      <div>
      </div>

     </div>
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Billing Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="comments-form contact-form" action="{{url('order/product')}}" method="POST">
  @csrf
     <div class="form-group">
            <label for="recipient-name" class="col-form-label"><span class="glyphicon glyphicon-earphone"></span> Phone Number:</label>
            <input type="text" class="form-control" id="recipient-name" value="{{Auth::user()->phone}}" name="phoneNumber">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label"><i class="fa fa-institution"></i> Location</label>
            <input type = "text" class="form-control" id="message-text" name="location"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label"><span class="glyphicon glyphicon-send"></span> Message</label>
            <input type="text"class="form-control" id="message-text" name="message">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label"><i class="fa fa-envelope"></i> Email</label>
            <input type="text"class="form-control" id="message-text" name="email" value="{{Auth::user()->email}}">
          </div>
          <input type="submit" class="btn btn-primary" value="{{__('customlang.order')}}">
          
  </form>
      </div>
    </div>
  </div>
</div>
      </form>
      @else
      <h4>No Items in Cart!!</h4>
      @endif
  </div>


  
  <div class="wishlist">
    <h3>Wish List Items</h3>
    @if(count($wishlist) > 0)
    @foreach($wishlist as $wishData)
      <div class="item">
        <div class="buttons">
         <a href = "{{url('addToCart/wishlist/'.$wishData->id)}}">Add to Cart</a>
        </div>
        <div class="image">
          <img src="{{ URL::asset('uploads/products/'.$wishData->image)}}" style="width: 110px; height: 80px" alt="No Image Found">
        </div>

        <div class="description">
          <span>{{$wishData->name}}</span>
          <span>Rs {{$wishData->price}}</span>
        </div>
        
      </div>
        @endforeach
        @else
        <h4>No Items in Wishlist!!</h4>
        @endif
  </div>
<div class="container">

  <h1 align="center">{{('You may like other products as well')}}</h1>
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


                      @foreach ($recommendProd as $datas)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="/view-products/{{$datas->id}}"><img src="{{ URL::asset('uploads/products/'.$datas->image)}}" style="width: 100%; height: 250px" alt="polo shirt img" ></a> 
                      <p>{{$datas->product_name}}</p>
                      <p>Rs {{$datas->price}}</p>

                      </figure> 
                    </li>
                    @endforeach
                   
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

</body>
</html>
    <script type="text/javascript">
     $(document).ready(function() {
        @foreach($products as $product)
        $("#totalQuantity{{$product->id}}").on('change keyup', function() {
        // alert("akd");
          var quantity = $("#totalQuantity{{$product->id}}").val();
          var price = $("#price{{$product->id}}").val();
          // console.log(quantity);
          $.ajax({
            url: "{{url('/cart/update')}}",
            data: 'quantity=' + quantity + "&price=" + price,
            type: 'get',
            success:function(response) {
              document.getElementById('totalPrice{{$product->id}}').innerHTML = response.quantity * response.price;
              document.getElementById('qty{{$product->id}}').innerHTML = "Quantity: " +response.quantity;
              console.log(response);

              // var sum = 0;
              // for(var i = 0; i<=response.length; i++) {
              //   sum = sum + (response.quantity * response.price);
              // }
              // document.getElementById('total').innerHTML = sum;

            }
          });
        });
        @endforeach

      
  
    $('.minus-btn').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest('div').find('input');
        var value = parseInt($input.val());

        if (value > 1) {
          value = value - 1;
        } else {
          value = 0;
        }

        $input.val(value);

      });

      $('.plus-btn').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest('div').find('input');
        var value = parseInt($input.val());

        if (value < 100) {
          value = value + 1;
        } else {
          value =100;
        }

        $input.val(value);
      });

      $('.like-btn').on('click', function() {
        $(this).toggleClass('is-active');
      });
    });
    </script>
