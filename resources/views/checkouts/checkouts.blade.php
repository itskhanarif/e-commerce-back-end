<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<h2>Responsive Checkout Form</h2>
</hr>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="{{ route('checkouts.store') }}" method="post">
        @csrf

        <div class="row">
          @if(Auth::check())
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i>Full name</label>
            <input type="text" id="fname" name="fname" value="{{ $user->first_name }} {{ $user->last_name }}">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" value="{{ $user->email }}">
            <label for="phone_no"><i class="fa fa-envelope"></i> Phone Number</label>
            <input type="text" id="phone_no" name="phone_no" value="{{ $user->phone_no }}">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="House #*, Road #*, Village, Thana, District">
            <label for="city"><i class="fa fa-institution"></i> District</label>
            <input type="text" id="city" name="city" value="{{ $user->district->name }}">
            <label for="message"><i class="fa fa-institution"></i> Do you have any message for seller?</label>
            <input type="text" id="message" name="message" placeholder="Your message to seller">

            <div class="row">
              <div class="col-50">
                <label for="state">Division</label>
                <input type="text" id="state" name="state" value="{{ $user->division->name }}">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>
          @else
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i>Full name</label>
            <input type="text" id="fname" name="firstname" placeholder="Khan Arif">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="example@test.com">
            <label for="phone_no"><i class="fa fa-envelope"></i> Phone Number</label>
            <input type="text" id="phone_no" name="phone_no" placeholder="+880123456789">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="House #*, Road #*, Village, Thana, District">
            <label for="city"><i class="fa fa-institution"></i> District</label>
            <input type="text" id="city" name="city" placeholder="Rajshahi">
            <label for="message"><i class="fa fa-institution"></i> Do you have any message for seller?</label>
            <input type="text" id="message" name="message" placeholder="Your message to seller">

            <div class="row">
              <div class="col-50">
                <label for="state">Division</label>
                <input type="text" id="state" name="state" placeholder="Rajshahi">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>
          @endif

          <div class="col-50">
            <div class="container">
              <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{ App\Models\Cart::totalItems() }}</b></span></h4>
              <table class="table table-bordered table-stripe">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Product Title</th>
                    <th>Product Quantity</th>
                    <th>Unit Price</th>
                    <th>Sub total Price</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $total_price = 0;
                  @endphp
                  @foreach (App\Models\Cart::cartProducts() as $cart)
                    <tr>
                      <td>
                        {{ $loop->index + 1 }}
                      </td>
                      <td>
                        <a href="{{ route('single-product-show', $cart->product->slug) }}">{{ $cart->product->title }}</a>
                      </td>
                      <td>
                        {{ $cart->product_quantity }}
                      </td>
                      <td>
                        {{ $cart->product->price }} Taka
                      </td>
                      <td>
                        @php
                        $total_price += $cart->product->price * $cart->product_quantity;
                        @endphp

                        {{ $cart->product->price * $cart->product_quantity }} Taka
                      </td>
                    </tr>
                  @endforeach
                    <tr>
                      <td></td> <td></td><td></td><td>Total </td><td> <span class="price" style="color:black"><b>{{ App\Models\Cart::totalPrice() }} Taka</b></span></td>
                    </tr>
                </tbody>
              </table>
              <label for="payment"><i class="fa fa-user"></i>Select a Payment method</label>
              <select class="form-control" name="payment_methode" required id="payments">
                <option value="">Select a Payment Method</option>
                @foreach($payments as $payment)
                  <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                @endforeach

              </select>
            </div>
          </div>
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
</div>
@include('FrontEnd.partials.scripts')
<script type="text/javascript">
    $('#payments').change(function(){
      alert('Hey');
    })
</script>
</body>
</html>
