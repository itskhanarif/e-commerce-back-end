@extends('admin.brand.layouts.master')



@section('body')
    @include('partials.messages')
    <table class="table">
      <tr>
          <th>Brand ID</th>
          <th>Brand Name</th>
          <th>Description</th>
          <th>Picture</th>
          <th>Action</th>
      </tr>
      @foreach($brands as $brand)
      <tr>
          <td>{{ $brand->id }}</td>
          <td>{{ $brand->name }}</td>
          <td>{{ $brand->description }}</td>
          <td>
            @foreach($brand->brand_image as $image)
            <img src="{{ asset('images/brand_image/'. $image->image) }}" alt="">
            @endforeach
          </td>
          <td>
            <a href="{{ route('brand-edit', $brand->id) }}">Edit</a>
            <a href="#deleteModal{{ $brand->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>
          </td>
            <!-- Modal -->
            <div class="modal fade" id="deleteModal{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Brand?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    You can edit it if you just need to change something.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form  action="{{ route('brand-delete', $brand->id) }}" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Delete This</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </tr>
      @endforeach
    </table>



@endsection
