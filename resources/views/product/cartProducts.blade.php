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
      <!-- Product #3 -->
      <input type="hidden" name="" id = "count" value="{{$count}}">
      @foreach($products as $product)
      <div class="item">
        <div class="buttons">
         <span class="glyphicon glyphicon-remove"></span>
        </div>
        <div class="image">
          <img src="{{ URL::asset('uploads/products/'.$product['item']['image'])}}" style="width: 110px; height: 80px" alt="polo shirt img">
        </div>

        <div class="description">
          <span>{{$product['item']['product_name']}}</span>
          <span id = "qty">Quantity: {{$product['qty']}}</span>
          <span>Rs {{$product['item']['price']}}</span>
          <input type="hidden" name="" id="price{{$product['item']['id']}}" value=" {{$product['item']['price']}}">
        </div>

        <div class="quantity">
          <button class="plus-btn" type="button" name="button" onclick="calcPricePlus()">
            <span class="glyphicon glyphicon-plus"></span> 
          </button>
          <input type="text" name="name" value="{{$product['qty']}}">
          <input type="hidden"  id = "totalQuantity{{$product['item']['id']}}" value="{{$product['qty']}}">
          <button class="minus-btn" type="button" name="button" onclick="calcPriceMinus()">
               <span class="glyphicon glyphicon-minus"></span> 
          </button>
        </div>

        <div class="total-price" id = "totalPrice{{$product['item']['id']}}">{{$product['price']}}</div>
      </div>
      @endforeach
      <button type="button" class="btn btn-primary btn-lg" style="width: 100%; height: 12%;margin-top: 3%">ORDER</button>
  </div>
@include('include.footer')

</body>
</html>
    <script type="text/javascript">
      function calcPricePlus() {
        // var i = document.getElementById('count').value;
        // for(i = 0; i<=3; i++) {
          var qty = parseInt(document.getElementById('totalQuantity1').value);
          var price = parseInt(document.getElementById('price1').value);
          // console.log(typeof(qty));
          var result = (qty + 1) * price;
          // console.log(result);
          document.getElementById("totalPrice1").innerHTML = result;

        }  
      // }  
      function calcPriceMinus() {
        var qty = document.getElementById('totalQuantity1').value;
        var price = parseInt(document.getElementById('price1').value);
        // console.log(typeof(qty));
        var result = (qty - 1) * price;
        document.getElementById("totalPrice1").innerHTML = result;
      }  
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
    </script>
  </body>
</html>