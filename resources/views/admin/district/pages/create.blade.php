@extends('admin.district.layouts.master')

@section('body')
<div class="container">
  <br><br><br><br>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-header">
          Add District
        </div>
        <div class="card-body">
          <form action="{{ route('district-store') }}" method="post" >
            {{ csrf_field() }}
              <div class="form-group">
                <label>Enter District Name</label>
                <input type="text" class="form-control"  name="name" placeholder="Enter District Name">
              </div>
              <button type="submit" class="btn btn-primary">Add District</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection
