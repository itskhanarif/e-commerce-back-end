@extends('layouts.master')

@section('title')
	E-Shop : Women's Fashion
@endsection

@section('body')
      @include('partials.nav')

      @include('partials.home-tv')

      @include('partials.catagory_promotion-1')


      <!-- container -->
  		<div class="container">
          @include('partials.latest_product')
  		</div>
  		<!-- /container -->



@endsection
