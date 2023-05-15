<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function changePassword()
    {
        return view('user.password');
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'image' => 'image|mimes:jpeg,bmp,png,jpg'
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.profile')->withErrors($validator)->withInput();
        } else {
            $image = $request->file('image');
            $slug = Str::slug($request->name);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Check Category Directory is Exist
                if (!Storage::disk('public')->exists('profile')) {
                    Storage::disk('public')->makeDirectory('profile');
                }

                // Resize image for category and upload
                $profile = Image::make($image)->resize(500, 500)->stream();
                Storage::disk('public')->put('profile/' . $imageName, $profile);
            } else {
                $imageName = $request->himage;;
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->image = $imageName;
            $user->about = $request->about;
            $user->save();
            Toastr::success('Profile Successfully Updated.', 'success');
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.changePassword')->withErrors($validator)->withInput();
        } else {
            $hashedPassword = Auth::user()->password;
            if (Hash::check($request->old_password, $hashedPassword)) {
                if (!Hash::check($request->password, $hashedPassword)) {
                    $user = User::find(Auth::id());
                    $user->password = Hash::make($request->password);
                    $user->save();
                    // Toastr::success('Password Successfully Changed.', 'Success');
                    Auth::logout();
                    return redirect()->route('login')->with('success', 'Password Successfully Changed.');
                } else {
                    Toastr::error('New password cannot be the same as old password.', 'Error');
                    return redirect()->back();
                }
            } else {
                Toastr::error('Current password do not match.', 'Error');
                return redirect()->back();
            }
        }
    }
}
