<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.category.index',[
            'products'=> Product::all(),
            'categories'=> Category::all(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $str_slug=  Str::slug($request->category_slag);
        // Category Images
        $new_name = $request->category_name.time(). "." . $request->file('category_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('category_photo'))->resize(200, 200);
        $img->save(base_path('public/uploads/category_photo/' . $new_name), 80);
        // Category Images
        Category::insert([
            'category_name' => $request->category_name,
            'category_slag' =>  $str_slug,
            'category_photo' => $new_name,
            'created_at' => Carbon::now(),
        ]);
        return redirect('category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // return $category;
        return view('layouts.dashboard.category.show',compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('layouts.dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;

        Category::find($id)->update([
                'category_name'=> $request -> category_name,
                'category_slag'=> $request -> category_slag,
        ]);

        if ($request->hasFile('category_photo')) {
        //    echo Category::find($id)->category_photo;
           unlink(base_path('public/uploads/category_photo/'.Category::find($id)->category_photo));

            // Category Images
        $new_name = $request->category_name.time(). "." . $request->file('category_photo')->getClientOriginalExtension();

        $img = Image::make($request->file('category_photo'))->resize(200, 200);

        $img->save(base_path('public/uploads/category_photo/' . $new_name), 80);
        // Category Images

        Category::find($id)->update([
                'category_photo'=> $new_name,

        ]);

        }
        return back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::find($category->id)->delete();
        return back();
    }
}

// DB::table('users')->delete($id);



