<?php

namespace App\Http\Controllers\BackEnd\seller;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Product_Image;
use Image;
use Illuminate\Http\Request;
use App\Models\Seller;

class SellerAuthPagesController extends Controller
{
 
    //login part
    public function LoginFormShow()
    {
      return view('seller.seller_auth.pages.login');
    }

    //registration part
    public function RegistrationFormShow(Request $request)
    {
      return view('seller.seller_auth.pages.registration_form');
    }

    public function RegistrationDataStore(Request $request)
    {
      $password = bcrypt($request->password);
      $seller = new Seller;
      $seller->name = $request->name;
      $seller->email = $request->email;
      $seller->password = $password;
      $seller->division = $request->division;
      $seller->save();
      return redirect()->route('seller.auth.afterauth');
    }
    public function afterauth()
    {
      return view('seller.seller_auth.pages.index_afterauth');
    }






    public function product_create()
    {
      return view('admin.products.product-create');
    }



    public function product_store(Request $request)
    {
      $product = new Product;
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
          Image::make($image)->save($image_location)->fit(300, 300);

          $product_image = new Product_Image;
          $product_image->product_id = $product->id;
          $product_image->image = $image_name;
          $product_image->save();
        }
      }

      return view('admin.products.product-create');
    }
    public function product_edit($id)
    {
      $product = Product::find($id);
      return view('admin.products.product-edit')->with('product', $product);
    }
    public function product_view()
    {
      $product_image = Product_Image::all();
      $products = Product::OrderBy('id', 'desc')->get();
      return view('admin.products.product-view')
                    ->with('products', $products)
                    ->with('product_image', $product_image);
    }
    public function product_update(Request $request, $id)
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
    public function product_delete($id)
    {
      $product = Product::find($id);
      if (!is_null($product)) {
        $product->delete();
        session()->flash('success', 'Your Product has been deleted successfully!');
      }

      return back();
    }
}
