<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    //    Profile Controller
    public function profile()
    {

        if (Verification::where('user_id', auth()->user()->id)->exists()) {
            if (Verification::where('user_id', auth()->user()->id)->first()->status) {
                $verification_status = true;
            } else {
                $verification_status = false;
            }
        } else {
            $verification_status = false;
        }
        return view('layouts.dashboard.profile.index', compact('verification_status'));
    }

    public function profile_photo_upload(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image',
        ]);
        $new_name = Auth::user()->id . "." . $request->file('profile_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('profile_photo'))->resize(300, 300);
        $img->save(base_path('public/uploads/profile_photo/' . $new_name), 80);

        User::find(auth()->id())->update(
            [
                'profile_photo' => $new_name,
            ]
        );
        return back();
    }
    public function profile_cover_upload(Request $request)
    {
        $request->validate([
            'cover_photo' => 'required|mimes:png,jpg',
        ]);
        $new_name = Auth::user()->id . "." . $request->file('cover_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('cover_photo'))->resize(1600, 451);
        $img->save(base_path('public/uploads/cover_photo/' . $new_name), 80);
        User::find(auth()->id())->update(
            [
                'cover_photo' => $new_name,
            ]
        );
        return back();
    }
    // Password Change
    public function password_change(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'password_confirmation' => 'required',
        ], [
            "old_password.required" => "rayan"
        ]);

        //   echo bcrypt($request->old_password);
        if (Hash::check($request->old_password, Auth::user()->password)) {
            User::find(auth()->id())->update([
                "password" => bcrypt($request->password)
            ]);
            return "hoise";
        } else {
            echo "DB Hasun er Songge Password Milche Na";
        }
    }
    // Password Change

    // Phone Number Verify
    public function phone_number_verify()
    {
        // echo auth()->user()->phone_number;
        // echo auth()->user()->name;
        //POST Method example
        // $random =rand(100,200);
        // echo $random;
        $random = rand(100, 200);
        $url = "http://66.45.237.70/api.php";
        $number = auth()->user()->phone_number;
        $text = "Hello, " . auth()->user()->name . "Tmr Kache taka pai " . $random;
        $data = array(
            'username' => "01834833973",
            'password' => "TE47RSDM",
            'number' => "$number",
            'message' => "$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|", $smsresult);
        $sendstatus = $p[0];
        Verification::insert([
            'user_id' => auth()->user()->id,
            'phone_number' => $number,
            'code' => $random,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('opt_success', 'Three Digit Code Send to Your Number');
    }
    // Phone Number Verify
    public function code_confirm(Request $request)
    {

        // echo $request->code;
        // echo Verification::where('user_id', auth()->user()->id)->first()->code;

        if ($request->code == Verification::where('user_id', auth()->user()->id)->first()->code) {
            Verification::where('user_id', auth()->user()->id)->update([
                'status' => true,
            ]);
            return back();
        } else {
            echo "mile nai";
        }
    }
}
