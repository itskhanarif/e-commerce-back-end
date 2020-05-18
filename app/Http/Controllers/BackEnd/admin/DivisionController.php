<?php

namespace App\Http\Controllers\BackEnd\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Division;



class DivisionController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
  public function create()
  {
    $divisions = Division::all();
    return view('admin.division.pages.create')->with('divisions', $divisions);
  }


  public function view()
  {
    $divisions = Division::all();
    return view('admin.division.pages.view')->with('divisions', $divisions);
  }


  public function store(Request $request)
  {
    $division = new Division;
    $division->name = $request->name;
    $division->save();
      return back();
  }
  public function edit($id)
  {
    $division = Division::find($id);
    return view('admin.division.pages.edit')->with('division', $division);
  }
  public function update(Request $request, $id)
  {
    $division = Division::find($id);
    $division->name = $request->name;
    $division->save();
    return back();
  }
  public function delete($id)
  {
    $division = Division::find($id);
    $division->delete();
    return back();
  }
}
