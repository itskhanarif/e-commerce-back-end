<?php

namespace App\Models;

use Auth;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  protected $fillable = [
      'product_id',
      'user_id',
      'order_id',
      'ip_address',
      'product_quantity'
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function order()
  {
    return $this->belongsTo(Order::class);
  }




  public static function totalItems()
  {

    if (Auth::check()) {
      $carts = Cart::where('user_id', Auth::id())->where('order_id', NULL)->get();
    }
    else {
      $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
    }

    $totalItem = 0;
    foreach ($carts as $cart) {
      $totalItem += $cart->product_quantity;
    }
    return $totalItem;
  }


  public static function cartProducts(){
    if (Auth::check()) {
      $cart_products = Cart::where('user_id', Auth::id())->where('order_id', NULL)->get();
    }
    else {
      $cart_products = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
    }
    return $cart_products;
  }


  public static function totalPrice()
  {
    if (Auth::check()) {
      $cart_products = Cart::where('user_id', Auth::id())->where('order_id', NULL)->get();
    }
    else {
      $cart_products = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
    }
    $items = $cart_products;
    $totalprice = 0;

    foreach ($items as $item) {
      $totalprice += ($item->product->price) * ($item->product_quantity);
    }
    return $totalprice;
  }
}
