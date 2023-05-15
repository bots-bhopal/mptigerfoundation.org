<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DownloadCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DownloadCategory::latest()->get();
        return view('admin.download-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.download-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.download-category.create')->withErrors($validator)->withInput();
        } else {
            $image = $request->file('image');
            $slug = Str::slug($request->name);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Check Category Directory is Exist
                if (!Storage::disk('public')->exists('download-category')) {
                    Storage::disk('public')->makeDirectory('download-category');
                }

                // Resize image for category and upload
                // $category = Image::make($image)->resize(720, null)->stream();
                Storage::disk('public')->put('download-category/' . $imageName, '');
            } else {
                $imageName = "default.png";
            }

            $category = new DownloadCategory();
            $category->name = $request->name;
            $category->slug = SlugService::createSlug(DownloadCategory::class, 'slug', $request->name);
            $category->image = $imageName;
            $category->save();
            Toastr::success('Category Successfully Saved.', 'success');
            return redirect()->route('admin.download-category.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DownloadCategory::find($id);
        return view('admin.download-category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = DownloadCategory::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.download-category.edit', $category->id)->withErrors($validator)->withInput();
        } else {
            $image = $request->file('image');
            $slug = Str::slug($request->name);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Check Category Directory is Exist
                if (!Storage::disk('public')->exists('download-category')) {
                    Storage::disk('public')->makeDirectory('download-category');
                }

                // Delete old image
                if (Storage::disk('public')->exists('download-category/' . $category->image)) {
                    Storage::disk('public')->delete('download-category/' . $category->image);
                }

                // Resize image for category and upload
                $categoryimage = Image::make($image)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();
                Storage::disk('public')->put('download-category/' . $imageName, $categoryimage);
            } else {
                $imageName = $request->himage;
            }

            $category->name = $request->name;
            $category->slug = $slug;
            $category->image = $imageName;
            $category->save();
            Toastr::success('Category Successfully Updated.', 'success');
            return redirect()->route('admin.download-category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = DownloadCategory::find($id);
        if (Storage::disk('public')->exists('download-category/' . $category->image)) {
            Storage::disk('public')->delete('download-category/' . $category->image);
        }
        $category->delete();
        Toastr::success('Category Successfully Deleted.', 'success');
        return redirect()->back();
    }
}
