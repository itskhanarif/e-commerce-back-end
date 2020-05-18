<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\District;
use App\Models\Division;


class UsersController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function dashboard()
    {
      $districts = District::all();
      $divisions = Division::all();
      $user = Auth::user();
      return view('user.dashboard')->with('user', $user)->with('districts', $districts)->with('divisions', $divisions);
    }
    public function update(Request $request)
    {
      $user = Auth::user();
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->email = $request->email;
      $user->phone_no = $request->phone_no;
      $user->district_id = $request->district;
      $user->division_id = $request->division;
      $user->save();
      return back();
    }
}
