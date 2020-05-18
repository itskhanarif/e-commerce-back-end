@extends('seller.seller_auth.layouts.master')

@section('body')

<div class="registration-page">
  <div class="form" >
    <form class="login-form" action="{{ route('seller.create') }}" method="post">
      {{ csrf_field() }}
      <input type="text" name="name" placeholder="Name"/> </br>
      <input type="email" name="email" placeholder="E-mail"/></br>
      <input type="password" name="password" placeholder="password"/></br>

      <input type="text" name="division" placeholder="Division"/></br>
      <button>Register</button>
    </form>
  </div>
</div>

@endsection
