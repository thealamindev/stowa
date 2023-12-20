<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function customerreg(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'phone_number' => 'required',
                'g-recaptcha-response' => 'required|captcha'

            ]);
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone_number'=>$request->phone_number,
            'role'=>'customer',
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('customer_reg_success', 'As a Coustomer Your Account Created!');
    }

    public function customerlogin(Request $request)
    {
        // return $request;
        // echo $request->email;
        // echo $request->password;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return Redirect('home');
        }
        else{
            echo "Email Or Password Melenai";
        }

    }
}





