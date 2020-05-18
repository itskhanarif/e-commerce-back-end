<form class="form-inline" action="{{ route('carts.store') }}" method="post">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</button>
</form>
