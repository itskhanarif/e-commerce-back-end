@extends('seller.seller_auth.layouts.master')

@section('body')
    <a href="{{ route('catagory-view') }}">Catagories</a></br>
    <a href="{{ route('catagory-create') }}">Add Catagories </a></br>

    <a href="{{ route('brand-view') }}">Brands</a></br>
    <a href="{{ route('brand-create') }}">Add Brands </a></br>

    <a href="{{ route('division-view') }}">Divisions</a></br>
    <a href="{{ route('division-create') }}">Add Divisions </a></br>

    <a href="{{ route('district-view') }}">Districts</a></br>
    <a href="{{ route('district-create') }}">Add Districts </a></br>
  </br></br>
  </hr>
    <form class="" action="{{ route('admin.logout') }}">
      @csrf
      <input type="submit" name="" value="Logout">
    </form>


@endsection
