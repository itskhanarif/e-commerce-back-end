@extends('admin.district.layouts.master')

@section('body')

    <div class="main-panel">
      <div class="content-wrapper">
        <div class="card">
          <div class="card-header">
            Update District Information
          </div>
          <div class="card-body">
            <form action="{{ route('district-update', $district->id) }}" method="post" >
              {{ csrf_field() }}
                <div class="form-group">
                  <label>Enter District Name</label>
                  <input type="text" class="form-control"  name="name" value="{{ $district->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Update District</button>
            </form>
          </div>
        </div>
      </div>
    </div>



@endsection
