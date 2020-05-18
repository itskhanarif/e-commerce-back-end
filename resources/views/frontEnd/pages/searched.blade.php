@extends('frontEnd.layouts.master')

@section('body')
<div class="container">
  <div class="row">
    <!-- section-title -->
    <div class="col-md-12">
      <div class="section-title">
        <h2 class="title">Searched Items</h2>
        <div class="pull-right">
          <div class="product-slick-dots-1 custom-dots"></div>
        </div>
      </div>
    </div>
    <!-- /section-title -->
    <h2>search item for <b>{{ $search }}</b></h2>
    <!-- banner -->
    <div class="col-md-3 col-sm-6 col-xs-6">
      <div class="banner banner-2">
        <img src="{{ asset('images/banner14.jpg') }}" alt="">
        <div class="banner-caption">
          <h2 class="white-color">NEW<br>COLLECTION</h2>
          <button class="primary-btn">Shop Now</button>
        </div>
      </div>
    </div>
    <!-- /banner -->

    <!-- Product Slick -->
    <div class="col-md-9 col-sm-6 col-xs-6">
      <div class="row">
        <div id="product-slick-1" class="product-slick">

          @foreach($products as $product)
          <!-- Product Single -->
          <div class="product product-single">
            <div class="product-thumb">
              <div class="product-label">
                <span>New</span>
                <span class="sale">-20%</span>
              </div>
              <ul class="product-countdown">
                <li><span>00 H</span></li>
                <li><span>00 M</span></li>
                <li><span>00 S</span></li>
              </ul>
              <a href="{{ route('single-product-show', $product->slug) }}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button></a>

              @foreach($product->Product_Image as $image)
                <img src="{{ asset('images/product_image/'. $image->image) }}" alt="">
              @endforeach

            </div>
            <div class="product-body">
              <h3 class="product-price">{{ $product->offer_price }}<del class="product-old-price">{{ $product->price }}</del></h3>
              <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o empty"></i>
              </div>
              <h2 class="product-name"><a href="#">{{ $product->title }}</a></h2>
              <div class="product-btns">
                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
              </div>
            </div>
          </div>
          <!-- /Product Single -->
          @endforeach

        </div>
      </div>
    </div>
    <!-- /Product Slick -->
  </div>
  <!-- /row -->
</div>
@endsection
