@extends('admin.catagory.layouts.master')



@section('body')
    @include('partials.messages')
    <table class="table">
      <tr>
          <th>Catagory ID</th>
          <th>Catagory Name</th>
          <th>Description</th>
          <th>Description</th>
          <th>Picture</th>
          <th>Action</th>
      </tr>
      @foreach($catagories as $catagory)
      <tr>
          <td>{{ $catagory->id }}</td>
          <td>{{ $catagory->name }}</td>
          <td>
            @if($catagory->parent_id == 0)
              Primary Catagory
            @else
              {{ $catagory->parent->name }}
            @endif
          </td>
          <td>{{ $catagory->description }}</td>
          <td>
            @foreach($catagory->catagory_image as $image)
            <img src="{{ asset('images/catagory_image/'. $image->image) }}" width="100" height="100">
            @endforeach
          </td>
          <td>
            <a href="{{ route('catagory-edit', $catagory->id) }}">Edit</a>
            <a href="#deleteModal{{ $catagory->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>
          </td>
            <!-- Modal -->
            <div class="modal fade" id="deleteModal{{ $catagory->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Catagory?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    You can edit it if you just need to change something.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form  action="{{ route('catagory-delete', $catagory->id) }}" method="post">
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
