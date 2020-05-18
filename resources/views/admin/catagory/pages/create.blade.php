@extends('admin.catagory.layouts.master')

@section('body')
<div class="container">
  <br><br><br><br>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-header">
          Add Catagory
        </div>
        <div class="card-body">
          <form action="{{ route('catagory-store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="form-group">
                <label>Enter Catagory Name</label>
                <input type="text" class="form-control"  name="name" placeholder="Enter Catagory Name">
              </div>
              <div class="form-group">
                <label>Enter Description</label>
                <input type="textarea" class="form-control"  name="description">
              </div>
              <div class="form-group">
                <label>Parent Catagory</label>
                <select class="form-control" name="parent_id">
                  <option value="0"></option>
                  @foreach($catagories as $catagory)
                  <option value="{{ $catagory->id }}">{{ $catagory->name }}</option>
                  @endforeach
                </select>
              </div>
              <div>
                <label>Product Images</label>
                <input type="file" name="image">
              </div>
              <button type="submit" class="btn btn-primary">Add Catagory</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection
