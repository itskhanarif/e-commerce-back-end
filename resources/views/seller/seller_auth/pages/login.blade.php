
@extends('seller.seller_auth.layouts.master')


@section('body')
<div class="login-page">
 <div class="form">
   <form class="login-form" action="{{ route('seller.login.submit') }}" method="post">
     {{ csrf_field() }}
     <input type="text" name="email" placeholder="email"/>
     <input type="password" name="password" placeholder="password"/>
     <input type="submit" name="submit" value="Login">
     <p class="message">Not registered? <a href="{{ route('seller.registration_form') }}">Create an account</a></p>
   </form>
 </div>
</div>
@endsection
