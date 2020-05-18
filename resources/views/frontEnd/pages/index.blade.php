@extends('frontEnd.layouts.master')

@section('title')
	E-Shop : Online shopping
@endsection

@section('body')

@include('frontEnd.partials.nav')

@include('frontEnd.partials.home-tv')


@include('frontEnd.partials.catagory_promotion-1')
<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
@include('frontEnd.partials.deals_of_the_day')

@include('frontEnd.partials.products_for_you')
	</div>
	<!-- /container -->
</div>
<!-- /section -->
@include('frontEnd.partials.lower_promotion')

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
@include('frontEnd.partials.latest_product')
@include('frontEnd.partials.picked_for_you')
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection
