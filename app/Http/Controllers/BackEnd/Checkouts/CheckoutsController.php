<?php

namespace App\Http\Controllers\BackEnd\Checkouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;

use Auth;

class CheckoutsController extends Controller
{
    public function index()
    {
      $user = Auth::user();
      $payments = Payment::all();
      return view('checkouts.checkouts')->with('user', $user)->with('payments', $payments);
    }
    public function store(Request $request)
    {
      $order = New Order;
      if(Auth::check()) {
        $order->user_id = Auth::id();
      }

      $order->ip_address = Request()->ip();
      $order->name = $request->fname;
      $order->phone_no = $request->phone_no;
      $order->shipping_address = $request->address;
      $order->email = $request->email;
      $order->message = $request->message;
      $order->save();
      session()->flash('success', 'Your Order has been taken.');
      foreach (Cart::cartProducts() as $cart_product) {
        $cart_product->order_id = $order->id;
        $cart_product->save();
      }


      return redirect()->route('index');
    }
}
