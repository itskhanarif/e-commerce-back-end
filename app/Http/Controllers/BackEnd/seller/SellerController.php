<?php

namespace App\Http\Controllers\BackEnd\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SellerController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('seller.seller_auth.pages.index_afterauth');
    }
}
