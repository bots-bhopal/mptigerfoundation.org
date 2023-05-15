<?php

/*  Name: Vaibhav Gupta (Web Developer)
    Date: 13-10-2021
*/

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Cviebrock\EloquentSluggable\Services\SlugService;

class MilestoneController extends Controller
{
    /* Milstones Management */
    public function index()
    {
        // Show Milestones
        $milestones = Milestone::latest()->get();
        return view('user.milestone.index', compact('milestones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create Milestone
        $milestones = Milestone::all();
        return view('user.milestone.create', compact('milestones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Store Milestone
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'pbody' => 'required',
            'image' => 'image|required|mimes:jpeg,bmp,png,jpg',
            'm_image.*' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.milestone.create')->withErrors($validator)->withInput();
        } else {
            //Featured Image
            $image = $request->file('image');
            $slug = Str::slug($request->title);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Check Category Directory is Exist
                if (!Storage::disk('public')->exists('milestone-image')) {
                    Storage::disk('public')->makeDirectory('milestone-image');
                }

                // Resize image for category and upload
                $featureImage = Image::make($image)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();
                Storage::disk('public')->put('milestone-image/' . $imageName, $featureImage);
            } else {
                $imageName = "default.png";
            }

            //News Images
            $mimages = $request->file('m_image');
            $images = [];

            if (isset($mimages)) {
                foreach ($mimages as $mimage) {
                    $currentDate = Carbon::now()->toDateString();
                    $mimageName = $currentDate . '-' . uniqid() . '.' . $mimage->getClientOriginalExtension();
                    $images[] = $mimageName;
                    $m_images = implode(",", $images);

                    // Check Category Directory is Exist
                    if (!Storage::disk('public')->exists('milestone-images')) {
                        Storage::disk('public')->makeDirectory('milestone-images');
                    }


                    // Resize image for category and upload
                    // $newsImage = Image::make($mimage)->resize(400, 250)->stream();
                    $newsImage = Image::make($mimage)->resize(1080, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();
                    Storage::disk('public')->put('milestone-images/' . $mimageName, $newsImage);
                }
            } else {
                $m_images = "default.png";
            }

            $milestone = new Milestone();
            $milestone->title = $request->title;
            $milestone->slug = SlugService::createSlug(Milestone::class, 'slug', $request->title);
            $milestone->description = $request->pbody;
            $milestone->image = $imageName;
            $milestone->images = $m_images;
            $milestone->save();

            Toastr::success('Milestone Successfully Saved.', 'success');
            return redirect()->route('user.milestone.index');
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
        // Edit Milestone
        $milestone = Milestone::find($id);

        if (!$milestone) {
            Toastr::error('No Milestone Found.', 'Error');
            return redirect()->route('user.dashboard');
        }
        return view('user.milestone.edit', compact('milestone'));
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
        // Update Milestone
        $milestone = Milestone::find($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'pbody' => 'required',
            'image' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.milestone.edit', $milestone->id)->withErrors($validator)->withInput();
        } else {
            //Featured Image
            $image = $request->file('image');
            $slug = Str::slug($request->title);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Check Category Directory is Exist
                if (!Storage::disk('public')->exists('milestone-image')) {
                    Storage::disk('public')->makeDirectory('milestone-image');
                }

                // Delete old image
                if (Storage::disk('public')->exists('milestone-image/' . $milestone->image)) {
                    Storage::disk('public')->delete('milestone-image/' . $milestone->image);
                }

                // Resize image for category and upload
                $featureImage = Image::make($image)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();
                Storage::disk('public')->put('milestone-image/' . $imageName, $featureImage);
            } else {
                $imageName = $request->himage;
            }

            //Milestone Images
            $mimages = $request->file('m_image');
            $images = [];

            if (isset($mimages)) {
                foreach ($mimages as $mimage) {
                    $currentDate = Carbon::now()->toDateString();
                    $mimageName = $currentDate . '-' . uniqid() . '.' . $mimage->getClientOriginalExtension();
                    $images[] = $mimageName;
                    $m_images = implode(",", $images);

                    // Check Category Directory is Exist
                    if (!Storage::disk('public')->exists('milestone-images')) {
                        Storage::disk('public')->makeDirectory('milestone-images');
                    }

                    $rm_images = explode(",", $milestone->images);

                    // Delete old image
                    foreach ($rm_images as $rimages) {
                        if (Storage::disk('public')->exists('milestone-images/' . $rimages)) {
                            Storage::disk('public')->delete('milestone-images/' . $rimages);
                        }
                    }

                    // Resize image for category and upload
                    $newsImage = Image::make($mimage)->resize(1080, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();
                    Storage::disk('public')->put('milestone-images/' . $mimageName, $newsImage);
                }
            } else {
                $m_images = $request->hmimage;
            }

            $milestone->title = $request->title;
            $milestone->slug =  SlugService::createSlug(Milestone::class, 'slug', $request->title);
            $milestone->description = $request->pbody;
            $milestone->image = $imageName;
            $milestone->images = $m_images;
            $milestone->save();

            Toastr::success('Milestone Successfully Updated.', 'success');
            return redirect()->route('user.milestone.index');
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
        // Delete Milestone
        $milestone = Milestone::find($id);

        if (!$milestone) {
            Toastr::error('No Milestone Found.', 'Error');
            return redirect()->back();
        }
        if (Storage::disk('public')->exists('milestone-image/' . $milestone->image)) {
            Storage::disk('public')->delete('milestone-image/' . $milestone->image);
        }

        $images = explode(",", $milestone->images);

        foreach ($images as $image) {
            if (Storage::disk('public')->exists('milestone-images/' . $image)) {
                Storage::disk('public')->delete('milestone-images/' . $image);
            }
        }
        $milestone->delete();
        Toastr::success('Milestone Successfully Deleted.', 'success');
        return redirect()->back();
    }
}
