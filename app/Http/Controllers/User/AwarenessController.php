<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Awareness;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AwarenessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show Awareness
        $awareness = Awareness::latest()->get();
        return view('user.awareness.index', compact('awareness'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create Awareness
        $awareness = Awareness::all();
        return view('user.awareness.create', compact('awareness'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Store Awareness
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            // 'edate' => 'required|date_format:Y-m-d',
            // 'etime' => 'required|date_format:H:i',
            'place' => 'required|max:255',
            'pbody' => 'required',
            'image' => 'image|required|mimes:jpeg,bmp,png,jpg',
            'm_image.*' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.awareness.create')->withErrors($validator)->withInput();
        } else {
            //Featured Image
            $image = $request->file('image');
            $slug = Str::slug($request->title);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Check Category Directory is Exist
                if (!Storage::disk('public')->exists('awareness-image')) {
                    Storage::disk('public')->makeDirectory('awareness-image');
                }

                // Resize image for category and upload
                // $featureImage = Image::make($image)->resize(770, 500)->stream();
                $featureImage = Image::make($image)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();
                Storage::disk('public')->put('awareness-image/' . $imageName, $featureImage);
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
                    if (!Storage::disk('public')->exists('awareness-images')) {
                        Storage::disk('public')->makeDirectory('awareness-images');
                    }


                    // Resize image for category and upload
                    // $newsImage = Image::make($mimage)->resize(400, 250)->stream();
                    $newsImage = Image::make($mimage)->resize(1080, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();
                    Storage::disk('public')->put('awareness-images/' . $mimageName, $newsImage);
                }
            } else {
                $m_images = "default.png";
            }

            $awareness = new Awareness();
            $awareness->title = $request->title;
            $awareness->slug = SlugService::createSlug(Awareness::class, 'slug', $request->title);
            // $awareness->date = $request->edate;
            // $awareness->time = $request->etime;
            $awareness->place = $request->place;
            $awareness->discription = $request->pbody;
            $awareness->image = $imageName;
            $awareness->m_image = $m_images;
            $awareness->save();

            Toastr::success('Awareness Successfully Saved.', 'success');
            return redirect()->route('user.awareness.index');
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
        // Edit Awareness
        $awareness = Awareness::find($id);

        if (!$awareness) {
            Toastr::error('No Record Found.', 'Error');
            return redirect()->route('user.dashboard');
        }
        return view('user.awareness.edit', compact('awareness'));
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
        // Update Awareness
        $awareness = Awareness::find($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            // 'edate' => 'required|date_format:Y-m-d',
            // 'etime' => 'required|date_format:H:i',
            'place' => 'required|max:255',
            'pbody' => 'required',
            'image' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.awareness.edit', $awareness->id)->withErrors($validator)->withInput();
        } else {
            //Featured Image
            $image = $request->file('image');
            $slug = Str::slug($request->title);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Check Category Directory is Exist
                if (!Storage::disk('public')->exists('awareness-image')) {
                    Storage::disk('public')->makeDirectory('awareness-image');
                }

                // Delete old image
                if (Storage::disk('public')->exists('awareness-image/' . $awareness->image)) {
                    Storage::disk('public')->delete('awareness-image/' . $awareness->image);
                }

                // Resize image for category and upload
                $featureImage = Image::make($image)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();
                Storage::disk('public')->put('awareness-image/' . $imageName, $featureImage);
            } else {
                $imageName = $request->himage;
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
                    if (!Storage::disk('public')->exists('awareness-images')) {
                        Storage::disk('public')->makeDirectory('awareness-images');
                    }

                    $rm_images = explode(",", $awareness->m_image);

                    // Delete old image
                    foreach ($rm_images as $rimages) {
                        if (Storage::disk('public')->exists('awareness-images/' . $rimages)) {
                            Storage::disk('public')->delete('awareness-images/' . $rimages);
                        }
                    }

                    // Resize image for category and upload
                    $newsImage = Image::make($mimage)->resize(1080, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();
                    Storage::disk('public')->put('awareness-images/' . $mimageName, $newsImage);
                }
            } else {
                $m_images = $request->hmimage;
            }

            $awareness->title = $request->title;
            $awareness->slug =  SlugService::createSlug(Awareness::class, 'slug', $request->title);
            // $awareness->date = $request->edate;
            // $awareness->time = $request->etime;
            $awareness->place = $request->place;
            $awareness->discription = $request->pbody;
            $awareness->image = $imageName;
            $awareness->m_image = $m_images;
            $awareness->save();

            Toastr::success('Awareness Successfully Updated.', 'success');
            return redirect()->route('user.awareness.index');
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
        // Delete Awareness
        $awareness = Awareness::find($id);

        if (!$awareness) {
            Toastr::error('No Record Found.', 'Error');
            return redirect()->back();
        }
        if (Storage::disk('public')->exists('awareness-image/' . $awareness->image)) {
            Storage::disk('public')->delete('awareness-image/' . $awareness->image);
        }

        $images = explode(",", $awareness->m_image);

        foreach ($images as $image) {
            if (Storage::disk('public')->exists('awareness-images/' . $image)) {
                Storage::disk('public')->delete('awareness-images/' . $image);
            }
        }
        $awareness->delete();
        Toastr::success('Awareness Successfully Deleted.', 'success');
        return redirect()->back();
    }
}
