@extends('admin.catagory.layouts.master')

@section('body')

    <div class="main-panel">
      <div class="content-wrapper">
        <div class="card">
          <div class="card-header">
            Update Catagory Information
          </div>
          <div class="card-body">
            <form action="{{ route('catagory-update', $catagory->id) }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="form-group">
                  <label>Enter Catagory Name</label>
                  <input type="text" class="form-control"  name="name" value="{{ $catagory->name }}">
                </div>
                <div class="form-group">
                  <label>Enter Description</label>
                  <input type="textarea" class="form-control"  name="description" value="{{ $catagory->description }}">
                </div>

                <div>
                  <label>Catagory Images</label>
                  <input type="file" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Update Products</button>
            </form>
          </div>
        </div>
      </div>
    </div>



@endsection
