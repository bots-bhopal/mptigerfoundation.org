<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show News
        $newses = News::latest()->get();
        return view('user.news.index', compact('newses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create News
        $newses = News::all();
        return view('user.news.create', compact('newses'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Store News
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'pbody' => 'required',
            'image' => 'image|required|mimes:jpeg,bmp,png,jpg',
            'm_image.*' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.news.create')->withErrors($validator)->withInput();
        } else {
            //Featured Image
            $image = $request->file('image');
            $slug = Str::slug($request->title);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Check Category Directory is Exist
                if (!Storage::disk('public')->exists('news-image')) {
                    Storage::disk('public')->makeDirectory('news-image');
                }

                // Resize image for category and upload
                // $featureImage = Image::make($image)->resize(770, 500)->stream();
                $featureImage = Image::make($image)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();
                Storage::disk('public')->put('news-image/' . $imageName, $featureImage);
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
                    if (!Storage::disk('public')->exists('news-images')) {
                        Storage::disk('public')->makeDirectory('news-images');
                    }


                    // Resize image for category and upload
                    // $newsImage = Image::make($mimage)->resize(400, 200)->stream();
                    $newsImage = Image::make($mimage)->resize(1080, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();
                    Storage::disk('public')->put('news-images/' . $mimageName, $newsImage);
                }
            } else {
                $m_images = "default.png";
            }

            $news = new News();
            $news->title = $request->title;
            $news->slug = SlugService::createSlug(News::class, 'slug', $request->title);
            $news->discription = $request->pbody;
            $news->image = $imageName;
            $news->m_image = $m_images;
            $news->save();

            Toastr::success('News Successfully Saved.', 'success');
            return redirect()->route('user.news.index');
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
        // Edit News
        $news = News::find($id);

        if (!$news) {
            Toastr::error('No News Found.', 'Error');
            return redirect()->route('user.dashboard');
        }

        return view('user.news.edit', compact('news'));
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
        // Update News
        $news = News::find($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'pbody' => 'required',
            'image' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.news.edit', $news->id)->withErrors($validator)->withInput();
        } else {
            //Featured Image
            $image = $request->file('image');
            $slug = Str::slug($request->title);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Check Category Directory is Exist
                if (!Storage::disk('public')->exists('news-image')) {
                    Storage::disk('public')->makeDirectory('news-image');
                }

                // Delete old image
                if (Storage::disk('public')->exists('news-image/' . $news->image)) {
                    Storage::disk('public')->delete('news-image/' . $news->image);
                }

                // Resize image for category and upload
                $featureImage = Image::make($image)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();
                Storage::disk('public')->put('news-image/' . $imageName, $featureImage);
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
                    if (!Storage::disk('public')->exists('news-images')) {
                        Storage::disk('public')->makeDirectory('news-images');
                    }

                    $rm_images = explode(",", $news->m_image);

                    // Delete old image
                    foreach ($rm_images as $rimages) {
                        if (Storage::disk('public')->exists('news-images/' . $rimages)) {
                            Storage::disk('public')->delete('news-images/' . $rimages);
                        }
                    }

                    // Resize image for category and upload
                    $newsImage = Image::make($mimage)->resize(1080, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream();
                    Storage::disk('public')->put('news-images/' . $mimageName, $newsImage);
                }
            } else {
                $m_images = $request->hmimage;
            }

            // $news = new News();
            $news->title = $request->title;
            $news->slug = SlugService::createSlug(News::class, 'slug', $request->title);
            $news->discription = $request->pbody;
            $news->image = $imageName;
            $news->m_image = $m_images;
            $news->save();

            Toastr::success('News Successfully Updated.', 'success');
            return redirect()->route('user.news.index');
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
        // Delete News
        $news = News::find($id);

        if (!$news) {
            Toastr::error('No News Found.', 'Error');
            return redirect()->back();
        }

        if (Storage::disk('public')->exists('news-image/' . $news->image)) {
            Storage::disk('public')->delete('news-image/' . $news->image);
        }

        $images = explode(",", $news->m_image);

        foreach ($images as $image) {
            if (Storage::disk('public')->exists('news-images/' . $image)) {
                Storage::disk('public')->delete('news-images/' . $image);
            }
        }
        $news->delete();
        Toastr::success('News Successfully Deleted.', 'success');
        return redirect()->back();
    }
}
