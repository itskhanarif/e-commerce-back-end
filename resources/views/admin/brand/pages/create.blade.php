@extends('admin.brand.layouts.master')

@section('body')
<div class="container">
  <br><br><br><br>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-header">
          Add Brand
        </div>
        <div class="card-body">
          <form action="{{ route('brand-store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="form-group">
                <label>Enter Brand Name</label>
                <input type="text" class="form-control"  name="name" placeholder="Enter Brand Name">
              </div>
              <div class="form-group">
                <label>Enter Description</label>
                <input type="textarea" class="form-control"  name="description">
              </div>

              <div>
                <label>Brand Images</label>
                <input type="file" name="image">
              </div>
              <button type="submit" class="btn btn-primary">Add Brand</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection
