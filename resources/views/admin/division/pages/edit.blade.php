@extends('admin.division.layouts.master')

@section('body')

    <div class="main-panel">
      <div class="content-wrapper">
        <div class="card">
          <div class="card-header">
            Update Division Information
          </div>
          <div class="card-body">
            <form action="{{ route('division-update', $division->id) }}" method="post" >
              {{ csrf_field() }}
                <div class="form-group">
                  <label>Enter Division Name</label>
                  <input type="text" class="form-control"  name="name" value="{{ $division->name }}">
                </div>

                <button type="submit" class="btn btn-primary">Update Division</button>
            </form>
          </div>
        </div>
      </div>
    </div>



@endsection
