<!-- row -->
<div class="row">
  <!-- section title -->
  <div class="col-md-12">
    <div class="section-title">
      <h2 class="title">Latest Products</h2>
    </div>
  </div>
  <!-- section title -->
@foreach($products as $product)
  <!-- Product Single -->
  <div class="col-md-3 col-sm-6 col-xs-6">
    <div class="product product-single">
      <div class="product-thumb">
        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
        @foreach($product->Product_Image as $image)
          <img src="{{ asset('images/product_image/'. $image->image) }}" alt="">
        @endforeach
      </div>
      <div class="product-body">
        <h3 class="product-price">{{ $product->price }}</h3>
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
          @include('frontEnd.partials.cart-button')
        </div>
      </div>
    </div>
  </div>
  <!-- /Product Single -->
  @endforeach

</div>
<!-- /row -->

<!-- row -->
<div class="row">
@foreach($products as $product)
  <!-- Product Single -->
  <div class="col-md-3 col-sm-6 col-xs-6">
    <div class="product product-single">
      <div class="product-thumb">
        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
        @foreach($product->Product_Image as $image)
          <img src="{{ asset('images/product_image/'. $image->image) }}" alt="">
        @endforeach
      </div>
      <div class="product-body">
        <h3 class="product-price">{{ $product->price }}</h3>
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
  </div>
  <!-- /Product Single -->
@endforeach
</div>
<!-- /row -->
