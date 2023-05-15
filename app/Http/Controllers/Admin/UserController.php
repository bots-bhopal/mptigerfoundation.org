<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function userView()
    {
        return view('admin.user.add-admin');
    }

    public function userAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
            'image' => 'mimes:jpeg,bmp,png,jpg',
            'profession' => 'required|max:50',
            'roles' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.user.view')->withErrors($validator)->withInput();
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
                $imageName = '';
            }

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->password);
            $user->image = $imageName;
            $user->profession = $request->input('profession');
            $user->role_id = $request->input('roles');
            $user->status = $request->input('status');
            $user->save();

            Toastr::success('Admin Created Successfully.', 'success');
            return redirect()->route('admin.user.list');
        }
    }

    public function userList()
    {
        $users = User::users()->get();
        $roles = Role::all();
        return view('admin.user.list-admin', compact('users', 'roles'));
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.user.edit-admin', compact('user', 'roles'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'password_confirmation' => ['required'],
            'image' => 'mimes:jpeg,bmp,png,jpg',
            'profession' => 'required|max:50',
            'roles' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.user.edit', $user->id)->withErrors($validator)->withInput();
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

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            // $user->password = Hash::make($request->password);
            $user->image = $imageName;
            $user->profession = $request->input('profession');
            $user->role_id = $request->input('roles');
            $user->status = $request->input('status');
            $user->update();

            Toastr::success('Admin Updated Successfully.', 'success');
            return redirect()->back();
        }
    }

    public function userChangePassword($id)
    {
        $user = User::findOrFail($id);

        if ($user->role_id == '3') {
            return view('admin.user.password', compact('user'));
        }

        Toastr::error('You are not authorized to access another user profile.', 'Error');
        return redirect()->back();
    }

    public function userUpdatePassword(Request $request, $id)
    {
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.user.changepassword', $user->id)->withErrors($validator)->withInput();
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();
            Toastr::success('Password Successfully Changed.', 'Success');
            // Auth::logout();
            return redirect()->back();
        }
    }

    public function userDestroy($id)
    {
        User::findOrFail($id)->delete();
        Toastr::success('Admin Deleted Successfully.', 'Success');
        return redirect()->back();
    }

    public function changeUserStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        if ($user->status == 0) {
            return response()->json(['message' => 'User account has been actived successfully.']);
        } else if ($user->status == 1) {
            return response()->json(['message' => 'User account has been deactived successfully.']);
        } else {
            return response()->json(['message' => 'Something went wrong !!']);
        }
    }
}
