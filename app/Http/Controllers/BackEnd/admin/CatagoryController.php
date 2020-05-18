<?php

namespace App\Http\Controllers\BackEnd\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Catagory;
use App\Models\catagory_image;
use Image;

class CatagoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
  public function create()
  {
    $catagories = Catagory::all();
    return view('admin.catagory.pages.create')->with('catagories', $catagories);
  }


  public function view()
  {
    $catagories = Catagory::all();
    return view('admin.catagory.pages.view')->with('catagories', $catagories);
  }


  public function store(Request $request)
  {
    $catagory = new Catagory;
    $catagory->name = $request->name;
    $catagory->description = $request->description;
    $catagory->parent_id = $request->parent_id;
    $catagory->image = '1';
    $catagory->save();


    if ($request->hasFile('image')) {

      $image = $request->file('image');
      $image_name = time() . '.'. $image->getClientOriginalExtension();
      $image_location = public_path('images/catagory_image/' .$image_name);
      Image::make($image)->save($image_location);

      $catagory_image = new catagory_image;
      $catagory_image->catagory_id = $catagory->id;
      $catagory_image->image = $image_name;
      $catagory_image->save();
      }
      return back();
  }
  public function edit($id)
  {
    $catagory = Catagory::find($id);
    return view('admin.catagory.pages.edit')->with('catagory', $catagory);
  }
  public function update(Request $request, $id)
  {
    $catagory = Catagory::find($id);
    $catagory->name = $request->name;
    $catagory->description = $request->description;
    $catagory->parent_id = '1';
    $catagory->image = '1';
    $catagory->save();


    if ($request->hasFile('image')) {

      $image = $request->file('image');
      $image_name = time() . '.'. $image->getClientOriginalExtension();
      $image_location = public_path('images/catagory_image/' .$image_name);
      Image::make($image)->save($image_location);

      $catagory_image = new catagory_image;
      $catagory_image->catagory_id = $catagory->id;
      $catagory_image->image = $image_name;
      $catagory_image->save();
      }
      return back();
  }
  public function delete($id)
  {
    $catagory = Catagory::find($id);
    $catagory->delete();
    return back();
  }
}
