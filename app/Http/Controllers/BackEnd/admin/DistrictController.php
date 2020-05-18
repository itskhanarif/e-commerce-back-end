<?php

namespace App\Http\Controllers\BackEnd\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\District;



class DistrictController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
  public function create()
  {
    $districts = District::all();
    return view('admin.district.pages.create')->with('districts', $districts);
  }


  public function view()
  {
    $districts = District::all();
    return view('admin.district.pages.view')->with('districts', $districts);
  }


  public function store(Request $request)
  {
    $district = new District;
    $district->name = $request->name;
    $district->save();
      return back();
  }
  public function edit($id)
  {
    $district = District::find($id);
    return view('admin.district.pages.edit')->with('district', $district);
  }
  public function update(Request $request, $id)
  {
    $district = District::find($id);
    $district->name = $request->name;
    $district->save();
    return back();
  }
  public function delete($id)
  {
    $district = District::find($id);
    $district->delete();
    return back();
  }
}
