@extends('seller.manage_product.layouts.master')

@section('body')

    <div class="main-panel">
      <div class="content-wrapper">
        <div class="card">
          <div class="card-header">
            Add Product
          </div>
          <div class="card-body">
            <form action="{{ route('product-update', $product->id) }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="form-group">
                  <label>Enter Title</label>
                  <input type="text" class="form-control"  name="title" value="{{ $product->title }}">
                </div>
                <div class="form-group">
                  <label>Enter Description</label>
                  <input type="textarea" class="form-control"  name="description" value="{{ $product->description }}">
                </div>
                <div class="form-group">
                  <label>Enter Quantity</label>
                  <input type="number" class="form-control"  name="quantity" value="{{ $product->quantity }}">
                </div>
                <div class="form-group">
                  <label>Enter Price</label>
                  <input type="number" class="form-control"  name="price" value="{{ $product->price }}">
                </div>
                <div>
                  <label>Product Images</label>
                  <input type="file" name="image[]">
                  <input type="file" name="image[]">
                  <input type="file" name="image[]">
                </div>
                <button type="submit" class="btn btn-primary">Update Products</button>
            </form>
          </div>
        </div>
      </div>
    </div>



@endsection
