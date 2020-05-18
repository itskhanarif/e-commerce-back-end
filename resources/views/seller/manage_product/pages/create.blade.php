@extends('seller.manage_product.layouts.master')


@section('body')
<div class="container">
  <br><br><br><br>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-header">
          Add Product
        </div>
        <div class="card-body">
          <form action="{{ route('product-store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="form-group">
                <label>Enter Title</label>
                <input type="text" class="form-control"  name="title" placeholder="Enter Title">
              </div>
              <div class="form-group">
                <label>Choose Catagory</label>
                <select class="form-control" name="catagory_id">
                  @foreach($catagories as $catagory)
                  <option value="{{ $catagory->id }}">{{ $catagory->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Enter Description</label>
                <input type="textarea" class="form-control"  name="description">
              </div>
              <div class="form-group">
                <label>Enter Quantity</label>
                <input type="number" class="form-control"  name="quantity" placeholder="Enter Quantity">
              </div>
              <div class="form-group">
                <label>Enter Price</label>
                <input type="number" class="form-control"  name="price" placeholder="Enter Price">
              </div>
              <div>
                <label>Product Images</label>
                <input type="file" name="image[]">
                <input type="file" name="image[]">
                <input type="file" name="image[]">
              </div>
              <button type="submit" class="btn btn-primary">Add Products</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection
