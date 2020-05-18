<?php

namespace App\Http\Controllers\BackEnd\seller;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Product_Image;
use App\Models\Catagory;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create()
    {
      $catagories = Catagory::all();
      return view('seller.manage_product.pages.create')->with('catagories', $catagories);
    }
    public function store(Request $request)
    {
      $product = new Product;
      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->quantity = $request->quantity;
      $product->catagory_id = $request->catagory_id;
      $product->brand_id = '0';
      $product->slug = Str::slug($request->title, '-');
      $product->status = 'Not Active';
      $product->offer_price = '0';
      $product->admin_id = '0';
      $product->save();

      /* Single Image Insert
      if ($request->hasFile('image')) {

        $image = $request->file('image');
        $image_name = time() . '.'. $image->getClientOriginalExtension();
        $image_location = public_path('images/product_image/' .$image_name);
        Image::make($image)->save($image_location);

        $product_image = new Product_Image;
        $product_image->product_id = $product->id;
        $product_image->image = $image_name;
        $product_image->save();
        }
        */
      if(count($request->image)>0){
        foreach ($request->image as $image) {
          $image_name = time() . '.'. $image->getClientOriginalExtension();
          $image_location = public_path('images/product_image/' .$image_name);
          Image::make($image)->save($image_location)->fit(300, 300);

          $product_image = new Product_Image;
          $product_image->product_id = $product->id;
          $product_image->image = $image_name;
          $product_image->save();
        }
      }

      return redirect()->route('seller.auth.afterauth');
    }
    public function edit($id)
    {
      $product = Product::find($id);
      return view('seller.manage_product.pages.edit')->with('product', $product);
    }
    public function view()
    {
      $product_image = Product_Image::all();
      $products = Product::OrderBy('id', 'desc')->get();
      return view('seller.manage_product.pages.view')
                    ->with('products', $products)
                    ->with('product_image', $product_image);
    }
    public function update(Request $request, $id)
    {
      $product = Product::find($id);
      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->quantity = $request->quantity;
      $product->catagory_id = '0';
      $product->brand_id = '0';
      $product->slug = 'headphone1';
      $product->status = 'Not Active';
      $product->offer_price = '0';
      $product->admin_id = '0';
      $product->save();

      /* Single Image Insert
      if ($request->hasFile('image')) {

        $image = $request->file('image');
        $image_name = time() . '.'. $image->getClientOriginalExtension();
        $image_location = public_path('images/product_image/' .$image_name);
        Image::make($image)->save($image_location);

        $product_image = new Product_Image;
        $product_image->product_id = $product->id;
        $product_image->image = $image_name;
        $product_image->save();
        }
        */
      if(count($request->image)>0){
        foreach ($request->image as $image) {
          $image_name = time() . '.'. $image->getClientOriginalExtension();
          $image_location = public_path('images/product_image/' .$image_name);
          Image::make($image)->save($image_location);

          $product_image = new Product_Image;
          $product_image->product_id = $product->id;
          $product_image->image = $image_name;
          $product_image->save();
        }
      }

      return back();
    }
    public function delete($id)
    {
      $product = Product::find($id);
      if (!is_null($product)) {
        $product->delete();
        session()->flash('success', 'Your Product has been deleted successfully!');
      }

      return back();
    }
}
