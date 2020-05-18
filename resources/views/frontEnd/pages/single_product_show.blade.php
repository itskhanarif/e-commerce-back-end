<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>{{ $product->title }}</h2>
    @foreach($product->Product_Image as $image)
      <img src="{{ asset('images/product_image/'. $image->image) }}" width="200" height="200">
    @endforeach
    <h3>price : {{ $product->price }}</h3>
  </body>
</html>
