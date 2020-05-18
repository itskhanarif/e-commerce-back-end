@extends('seller.seller_auth.layouts.master')

@section('body')
    <a href="{{ route('product-create') }}">Add Product </a>
    <a href="#">Orders</a>
    <a href="{{ route('product-view') }}">Store</a>
    <a href="{{ route('seller.logout') }}">logout</a>
@endsection
 
