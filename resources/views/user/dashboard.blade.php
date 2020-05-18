@extends('seller.manage_product.layouts.master')

@section('body')

    <div class="main-panel">
      <div class="content-wrapper">
        <div class="card">
          <div class="card-header">
            Your Profile
            <h2>You can update your profile</h2>
          </div>
          <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="post" >
              {{ csrf_field() }}
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control"  name="first_name" value="{{ $user->first_name }}">
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control"  name="last_name" value="{{ $user->last_name }}">
                </div>
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="text" class="form-control"  name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" class="form-control"  name="phone_no" value="{{ $user->phone_no }}">
                </div>
                <div class="form-group row">
                    <label for="district" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>

                    <div class="col-md-6">
                      <select  name="district">
                        @foreach($districts as $district)
                        <option value="{{ $district->id }}" {{ $user->district_id == $district->id ? 'selected' : '' }} >{{ $district->name }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="division" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>

                    <div class="col-md-6">
                      <select  name="division">
                        @foreach($divisions as $division)
                        <option value="{{ $division->id }}" {{ $user->division_id == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
          </div>
        </div>
      </div>
    </div>



@endsection
