<?php

namespace App\Http\Controllers\BackEnd\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Brand;
use App\Models\Brand_Image;
use Image;

class BrandController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
  public function create()
  {
    return view('admin.brand.pages.create');
  }


  public function view()
  {
    $brands = Brand::all();
    return view('admin.brand.pages.view')->with('brands', $brands);
  }


  public function store(Request $request)
  {
    $brand = new Brand;
    $brand->name = $request->name;
    $brand->description = $request->description;
    $brand->image = '1';
    $brand->save();


    if ($request->hasFile('image')) {

      $image = $request->file('image');
      $image_name = time() . '.'. $image->getClientOriginalExtension();
      $image_location = public_path('images/brand_image/' .$image_name);
      Image::make($image)->save($image_location);

      $brand_image = new Brand_Image;
      $brand_image->brand_id = $brand->id;
      $brand_image->image = $image_name;
      $brand_image->save();
      }
      return back();
  }
  public function edit($id)
  {
    $brand = Brand::find($id);
    return view('admin.brand.pages.edit')->with('brand', $brand);
  }
  public function update(Request $request, $id)
  {
    $brand = Brand::find($id);
    $brand->name = $request->name;
    $brand->description = $request->description;
    $brand->image = '1';
    $brand->save();


    if ($request->hasFile('image')) {

      $image = $request->file('image');
      $image_name = time() . '.'. $image->getClientOriginalExtension();
      $image_location = public_path('images/brand_image/' .$image_name);
      Image::make($image)->save($image_location);

      $brand_image = new Brand_Image;
      $brand_image->brand_id = $brand->id;
      $brand_image->image = $image_name;
      $brand_image->save();
      }
      return back();
  }
  public function delete($id)
  {
    $brand = Brand::find($id);
    $brand->delete();
    return back();
  }
}
