<?php

namespace App\Http\Controllers\BackEnd\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{

    //constructor ta authenticated na houya porjonto onno kono page a jete dibe na
    public function __construct()
    {
      
        $this->middleware('auth:admin');
    }
    public function afterauth()
    {
      return view('admin.admin_auth.pages.index_afterauth');
    }
}
