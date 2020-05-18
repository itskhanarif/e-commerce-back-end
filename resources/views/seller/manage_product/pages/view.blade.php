@extends('seller.manage_product.layouts.master')



@section('body')
    @include('frontEnd.partials.messages')
    <table class="table">
      <tr>
          <th>Product ID</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Offer Price</th>
          <th>Description</th>
          <th>Picture</th>
          <th>Action</th>
      </tr>
      @foreach($products as $product) 
      <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->title }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->offer_price }}</td>
        <td>{{ $product->description }}</td>
        @foreach($product->Product_Image as $image)
          <td><img src="{{ asset('images/product_image/'. $image->image) }}" width="100" height="100"></td>
        @endforeach
        <td>
          <a href="{{ route('product-edit', $product->id) }}">Edit</a>
          <a href="#deleteModal{{ $product->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>
        </td>
          <!-- Modal -->
          <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Product?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  You can edit it if you just need to change something.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <form  action="{{ route('product-delete', $product->id) }}" method="post">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger">Delete This</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
      @endforeach
    </table>



@endsection
