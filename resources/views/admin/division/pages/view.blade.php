@extends('admin.division.layouts.master')



@section('body')
    @include('frontEnd.partials.messages')
    <table class="table">
      <tr>
          <th>Division ID</th>
          <th>Division Name</th>
          <th>Action</th>
      </tr>
      @foreach($divisions as $division)
      <tr>
          <td>{{ $division->id }}</td>
          <td>{{ $division->name }}</td>
          <td>
            <a href="{{ route('division-edit', $division->id) }}">Edit</a>
            <a href="#deleteModal{{ $division->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>
          </td>
            <!-- Modal -->
            <div class="modal fade" id="deleteModal{{ $division->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Division?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    You can edit it if you just need to change something.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form  action="{{ route('division-delete', $division->id) }}" method="post">
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
