@extends('admin.division.layouts.master')

@section('body')
<div class="container">
  <br><br><br><br>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-header">
          Add Division
        </div>
        <div class="card-body">
          <form action="{{ route('division-store') }}" method="post">
            {{ csrf_field() }}
              <div class="form-group">
                <label>Enter Division Name</label>
                <input type="text" class="form-control"  name="name" placeholder="Enter Division Name">
              </div>

              <button type="submit" class="btn btn-primary">Add Division</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection
