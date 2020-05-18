<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class CartsController extends Controller
{
    public function index()
    {
      return view('frontEnd.pages.carts');
    }
    public function store(Request $request)
    {


      if (Auth::check()) {
        $cart = Cart::Where('user_id', Auth::id())->where('product_id', $request->product_id)->first();
      }
      else{
        $cart = Cart::Where('ip_address', request()->ip())->where('product_id', $request->product_id)->first();
      }

      if (!is_null($cart)) {
        $cart->increment('product_quantity');
        session()->flash('success', 'You Added a same product. So, Product Quantity has been increased by 1 unit');
      }
      else{
        $cart = new Cart;
        $cart->product_id = $request->product_id;
        if (Auth::check()) {
          $cart->user_id = Auth::id();
        }
        $cart->ip_address = request()->ip();
        $cart->save();
        session()->flash('success', 'You Added a product on your cart');
      }
      return back();

    }
    public function update(Request $request, $id)
    {
      $cart = Cart::find($id);
      $cart->product_quantity = $request->product_quantity;
      $cart->save();
      Session()->flash('success', 'You have updated your cart');
      return back();
    }
    public function delete(Request $request, $id)
    {
      $cart = Cart::find($id);
      $cart->delete();
      Session()->flash('success', 'You have deleted a item from your cart');
      return back();
    }
}
