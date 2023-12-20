<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewadminMail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'customer') {
            return view('frontend.customerDashboard');
        } else {
            return view('home');
        }
    }
    public function users()
    {
        $users = User::all();
        return view('layouts.dashboard.users', compact('users'));
    }
    public function adduser(Request $request)
    {

        $request->validate([
            'admin_email' => 'unique:App\Models\User,email'
        ]);
        $password = Str::random(8);
        User::insert([
            'name' => $request->admin_name,
            'email' => $request->admin_email,
            'password' => $password,
            'created_at' => Carbon::now(),
            'role' => 'admin',
        ]);
        // return back();
        Mail::to($request->admin_email)->send(new NewadminMail(auth()->user()->name,$request->admin_email,$password));

    }
}
