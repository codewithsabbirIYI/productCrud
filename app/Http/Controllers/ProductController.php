<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use File;
use Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
       return view('backend.manageProducts',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        if($request ->product_image){
            $image = $request->file('product_image');
            $custome_name = rand(). ".".$image->getClientOriginalExtension();
            $path = public_path('uploads/'.$custome_name);
            Image::make($image)->resize(121,264)->save($path);
        }
        Product::create([
            'product_name' => $request->product_name,
            'Product_category' => $request->Product_category,
            'product_brand' => $request->product_brand,
            'product_description' => $request->product_description,
            'product_image' => $custome_name,
        ]);

        return redirect()->route('manage.product')->with('message', 'Product Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('backend.editProduct',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product =  Product::find($id);
        if($request->product_image){
            $old_image = $product->product_image;
            if(File::exists(public_path('uploads/'.$old_image))){
                File::delete(public_path('uploads/'.$old_image));
            }
            $image = $request->file('product_image');
            $custome_name = rand(). ".".$image->getClientOriginalExtension();
            $path = public_path('uploads/'.$custome_name);
            Image::make($image)->resize(121,264)->save($path);

            $product->product_name = $request-> product_name;
            $product->Product_category = $request->Product_category;
            $product->product_brand = $request->product_brand;
            $product->product_description = $request->product_description;
            $product->product_image = $request->product_image;
            $product->update();
        }
        $product->product_name = $request-> product_name;
        $product->Product_category = $request->Product_category;
        $product->product_brand = $request->product_brand;
        $product->product_description = $request->product_description;
        $product->product_image = $request->product_image;
        $product->update();
        return redirect()->route('manage.product')->with('message', 'product update done');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product =  Product::find($id);
        $product_image = $product->product_image;
        File::delete(public_path('uploads/'.$product_image));
        $product->delete();
        return redirect()->route('manage.product')->with('message', 'product update done');

    }
}
