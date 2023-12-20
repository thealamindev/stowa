<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.product.index', [
            
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.product.create', [
            'categories' => Category::get(['id', 'category_name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create($request->except('_token') + [
            'thumbnail' => 'Apadoto Photo nai',
        ]);

        // Product Images
        if ($request->hasFile('thumbnail')) {

            //  Images
            $new_name = $product->id . time() . "." . $request->file('thumbnail')->getClientOriginalExtension();

            $img = Image::make($request->file('thumbnail'))->resize(800, 609);

            $img->save(base_path('public/uploads/thumbnail_photo/' . $new_name), 80);
            //  Images

            Product::find($product->id)->update([
                'thumbnail' => $new_name,
            ]);
        }
        // Product Images
        return back();
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $sizes = Size::all();
        return view('layouts.dashboard.product.edit', compact('product', 'categories','sizes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // 3rd 
        $size = implode(",",$request->sizes);
    // 3rd  
        $product->update([
            'name' => $request->name,
            'purchase_price' => $request->purchase_price,
            'reguler_price' => $request->reguler_price,
            'discount_price' => $request->discount_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'additional_information' => $request->additional_information,
            'sizes' => $size,
        ]);

        if ($request->hasFile('thumbnail')) {
            //    echo Category::find($id)->category_photo;
            unlink(base_path('public/uploads/thumbnail_photo/' .$product->thumbnail));

            // Category Images
            $new_name = $product->id . time() . "." . $request->file('thumbnail')->getClientOriginalExtension();

            $img = Image::make($request->file('thumbnail'))->resize(800, 609);

            $img->save(base_path('public/uploads/thumbnail_photo/' . $new_name), 80);
            // Category Images

           $product->update([
                'thumbnail' => $new_name,

            ]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::find($product->id)->delete();
        return back();
    }
}
