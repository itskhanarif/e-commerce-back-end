<?php

namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
      $products = Product::OrderBy('id', 'desc')->get();
      return view('frontEnd.pages.index')->with('products', $products);
    }
    public function show($slug)
    {
      $product = Product::where('slug', $slug)->first();
      return view('frontEnd.pages.single_product_show')->with('product', $product);
    }
    public function search(Request $request)
    {
      $search = $request->search;
      $products = Product::
      orWhere('title', 'like', '%'.$search.'%')
      ->orWhere('description', 'like', '%'.$search.'%')
      ->orderBy('id', 'desc')->paginate(9);
      return view('frontEnd.pages.searched')->with('search', $search)->with('products', $products);
    }






    public function women_clothing()
    {
      $products = Product::OrderBy('id', 'desc')->get();
      return view('pages.women-clothing')->with('products', $products);
    }
    public function men_clothing()
    {
      $products = Product::OrderBy('id', 'desc')->get();
      return view('pages.index')->with('products', $products);
    }
    public function bags_shoes()
    {
      $products = Product::OrderBy('id', 'desc')->get();
      return view('pages.index')->with('products', $products);
    }
    public function computer_office()
    {
      $products = Product::OrderBy('id', 'desc')->get();
      return view('pages.index')->with('products', $products);
    }
    public function consumer_electronics()
    {
      $products = Product::OrderBy('id', 'desc')->get();
      return view('pages.index')->with('products', $products);
    }
    public function jewelary_watches()
    {
      $products = Product::OrderBy('id', 'desc')->get();
      return view('pages.index')->with('products', $products);
    }
    public function phone_accessories()
    {
      $products = Product::OrderBy('id', 'desc')->get();
      return view('pages.index')->with('products', $products);
    }
}
