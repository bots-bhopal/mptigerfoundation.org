<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Cviebrock\EloquentSluggable\Services\SlugService;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show Event
        $events = Event::latest()->get();
        return view('user.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create Event
        $events = Event::all();
        return view('user.event.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Store Event
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'edate' => 'required|date_format:Y-m-d',
            'etime' => 'required|date_format:H:i',
            'place' => 'required|max:255',
            'pbody' => 'required',
            'image' => 'image|required|mimes:jpeg,bmp,png,jpg',
            'm_image.*' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.event.create')->withErrors($validator)->withInput();
        } else {
            //Featured Image
            $image = $request->file('image');
            $slug = Str::slug($request->title);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Check Category Directory is Exist
                if (!Storage::disk('public')->exists('event-image')) {
                    Storage::disk('public')->makeDirectory('event-image');
                }

                // Resize image for category and upload
                $featureImage = Image::make($image)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();
                Storage::disk('public')->put('event-image/' . $imageName, $featureImage);
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
                    if (!Storage::disk('public')->exists('event-images')) {
                        Storage::disk('public')->makeDirectory('event-images');
                    }


                    // Resize image for category and upload
                    // $newsImage = Image::make($mimage)->resize(400, 250)->stream();
                    $newsImage = Image::make($mimage)->resize(1080, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();
                    Storage::disk('public')->put('event-images/' . $mimageName, $newsImage);
                }
            } else {
                $m_images = "default.png";
            }

            $event = new Event();
            $event->title = $request->title;
            $event->slug = SlugService::createSlug(Event::class, 'slug', $request->title);
            $event->date = $request->edate;
            $event->time = $request->etime;
            $event->place = $request->place;
            $event->discription = $request->pbody;
            $event->image = $imageName;
            $event->m_image = $m_images;
            $event->save();

            Toastr::success('Event Successfully Saved.', 'success');
            return redirect()->route('user.event.index');
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
        // Edit Event
        $event = Event::find($id);

        if (!$event) {
            Toastr::error('No Event Found.', 'Error');
            return redirect()->route('user.dashboard');
        }
        return view('user.event.edit', compact('event'));
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
        // Update Event
        $event = Event::find($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'edate' => 'required|date_format:Y-m-d',
            'etime' => 'required|date_format:H:i',
            'place' => 'required|max:255',
            'pbody' => 'required',
            'image' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.event.edit', $event->id)->withErrors($validator)->withInput();
        } else {
            //Featured Image
            $image = $request->file('image');
            $slug = Str::slug($request->title);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Check Category Directory is Exist
                if (!Storage::disk('public')->exists('event-image')) {
                    Storage::disk('public')->makeDirectory('event-image');
                }

                // Delete old image
                if (Storage::disk('public')->exists('event-image/' . $event->image)) {
                    Storage::disk('public')->delete('event-image/' . $event->image);
                }

                // Resize image for category and upload
                $featureImage = Image::make($image)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();
                Storage::disk('public')->put('event-image/' . $imageName, $featureImage);
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
                    if (!Storage::disk('public')->exists('event-images')) {
                        Storage::disk('public')->makeDirectory('event-images');
                    }

                    $rm_images = explode(",", $event->m_image);

                    // Delete old image
                    foreach ($rm_images as $rimages) {
                        if (Storage::disk('public')->exists('event-images/' . $rimages)) {
                            Storage::disk('public')->delete('event-images/' . $rimages);
                        }
                    }

                    // Resize image for category and upload
                    $newsImage = Image::make($mimage)->resize(1080, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();
                    Storage::disk('public')->put('event-images/' . $mimageName, $newsImage);
                }
            } else {
                $m_images = $request->hmimage;
            }

            $event->title = $request->title;
            $event->slug =  SlugService::createSlug(Event::class, 'slug', $request->title);
            $event->date = $request->edate;
            $event->time = $request->etime;
            $event->place = $request->place;
            $event->discription = $request->pbody;
            $event->image = $imageName;
            $event->m_image = $m_images;
            $event->save();

            Toastr::success('Event Successfully Updated.', 'success');
            return redirect()->route('user.event.index');
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
        // Delete Event
        $event = Event::find($id);

        if (!$event) {
            Toastr::error('No Event Found.', 'Error');
            return redirect()->back();
        }
        if (Storage::disk('public')->exists('event-image/' . $event->image)) {
            Storage::disk('public')->delete('event-image/' . $event->image);
        }

        $images = explode(",", $event->m_image);

        foreach ($images as $image) {
            if (Storage::disk('public')->exists('event-images/' . $image)) {
                Storage::disk('public')->delete('event-images/' . $image);
            }
        }
        $event->delete();
        Toastr::success('Event Successfully Deleted.', 'success');
        return redirect()->back();
    }
}
