<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\Contact;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index',[
            'products'=> Product::latest()->get(),
            'categories'=> Category::all(),
        ]);
    }
    public function productdetails($id)
    {
        $products= Product::findOrFail($id);
        // ======== 5th
        $sizes = explode(",",$products->sizes);
        // ===========5th
        $related_product =  Product::where('category_id', $products->category_id)->where('id', '!=',$id)->get();
        return view('frontend.product_details', compact('products','related_product','sizes'));
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function account()
    {
        return view('frontend.account');
    }

    public function contactpost(Request $request)
    {
        // $hello = $request->except('_token');

        Mail::to($request->email)->send(new Contact($request->except('_token')));
        return back()->with('contact_sent',"Dear $request->name sir, Please Check Your Mail.");
    }
}
