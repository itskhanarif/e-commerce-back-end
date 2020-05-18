@extends('seller.seller_auth.layouts.master')

@section('body')

<div class="registration-page">
  <div class="form">
    <form class="login-form">
      <input type="text" name="account_id" placeholder="Account Type(Bussiness or Personal)"/> </br>
      <input type="text" name="mobile_number" placeholder="Mobile Number"/></br>
      <input type="password" placeholder="password"/></br>
      <input type="email" name="email" placeholder="E-mail"/></br>
      <input type="text" name="shop_name" placeholder="Shop Name"/></br>
      <button>Register</button>
    </form>
  </div>
</div>

@endsection
