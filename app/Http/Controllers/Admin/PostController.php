<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use App\Notifications\AuthorPostApproved;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display Post
        $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create Post
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Store Post
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg',
            'images.*' => 'image|mimes:jpeg,bmp,png,jpg',
            // 'categories' => 'required',
            'pbody' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.post.create')->withErrors($validator)->withInput();
        } else {
            $image = $request->file('image');
            $slug = Str::slug($request->title);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Check Category Directory is Exist
                if (!Storage::disk('public')->exists('post')) {
                    Storage::disk('public')->makeDirectory('post');
                }

                // Resize image for category and upload
                // $postImage = Image::make($image)->resize(770, 450)->stream();
                $postImage = Image::make($image)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();
                Storage::disk('public')->put('post/' . $imageName, $postImage);

                // Check Category Directory is Exist
                // if (!Storage::disk('public')->exists('latest-news')) {
                //     Storage::disk('public')->makeDirectory('latest-news');
                // }

                // Resize image for category and upload
                // $postImage = Image::make($image)->resize(90, 90)->stream();
                $postImage = Image::make($image)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();
                Storage::disk('public')->put('latest-news/' . $imageName, $postImage);
            } else {
                $imageName = "default.png";
            }

            $post = new Post();
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->slug = SlugService::createSlug(Post::class, 'slug', $request->title);
            $post->image = $imageName;
            $post->body = $request->pbody;
            // if (isset($request->status)) {
            //     $post->status = true;
            // } else {
            //     $post->status = false;
            // }
            $post->is_approved = true;
            $post->save();

            //Store Multiple Images
            $images =  $request->file('images');

            if (is_array($images)) {
                foreach ($images as $image) {
                    $newImages = time() . $image->getClientOriginalName();
                    $image->storeAs('public/post-images/', $newImages);
                    PostImage::create([
                        'post_id' => $post->id,
                        'image' => $newImages
                    ]);
                }
            }

            $post->categories()->attach($request->categories);

            Toastr::success('Post Successfully Saved.', 'success');
            return redirect()->route('admin.post.index');
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
        //Show Post
        $post = Post::find($id);

        if (!$post) {
            Toastr::error('No Post Found.', 'Error');
            return redirect()->route('admin.dashboard');
        }

        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Edit Post
        $post = Post::find($id);

        if (!$post) {
            Toastr::error('No Post Found.', 'Error');
            return redirect()->route('admin.dashboard');
        }

        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
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
        //Update Post
        $post = Post::find($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg',
            // 'categories' => 'required',
            'pbody' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.post.edit', $post->id)->withErrors($validator)->withInput();
        } else {
            $image = $request->file('image');
            $slug = Str::slug($request->title);

            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Check Category Directory is Exist
                if (!Storage::disk('public')->exists('post')) {
                    Storage::disk('public')->makeDirectory('post');
                }

                // Delete old image
                if (Storage::disk('public')->exists('post/' . $post->image)) {
                    Storage::disk('public')->delete('post/' . $post->image);
                }

                // Resize image for category and upload
                $postImage = Image::make($image)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();
                Storage::disk('public')->put('post/' . $imageName, $postImage);
            } else {
                $imageName = $request->himage;
            }

            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->slug = SlugService::createSlug(Post::class, 'slug', $request->title);
            $post->image = $imageName;
            $post->body = $request->pbody;
            // if (isset($request->status)) {
            //     $post->status = true;
            // } else {
            //     $post->status = false;
            // }
            $post->is_approved = true;
            $post->save();

            // Update Multiple Images
            $images = $request->file('images');
            $old_images = $request->input('h_images');

            if (is_null($images)) {
                $post->image = $old_images;
            } else {
                foreach ($images as $image) {
                    $name = time() . $image->getClientOriginalName();
                    PostImage::updateOrCreate([
                        'post_id' => $post->id,
                        'image' => $name
                    ]);

                    $image->storeAs('public/post-images/', $name);
                }
            }

            $post->categories()->sync($request->categories);

            Toastr::success('Post Successfully Updated.', 'success');
            return redirect()->route('admin.post.index');
        }
    }

    public function pending()
    {
        //Pending Post
        $posts = Post::where('is_approved', false)->get();
        return view('admin.post.pending', compact('posts'));
    }

    public function approval($id)
    {
        //Post Approval
        $post = Post::find($id);
        if ($post->is_approved == false) {
            $post->is_approved = true;
            $post->save();
            $post->user->notify(new AuthorPostApproved($post));

            Toastr::success('Post Successfully Approved.', 'Success');
        } else {
            Toastr::info('This Post is already approved.', 'Info');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Post
        $post = Post::find($id);

        if (!$post) {
            Toastr::error('No Post Found.', 'Error');
            return redirect()->back();
        }

        if (Storage::disk('public')->exists('post/' . $post->image)) {
            Storage::disk('public')->delete('post/' . $post->image);
        }

        foreach ($post->images as $image) {
            $images = "/public/post-images/" . $image->image;
            if (Storage::exists($images)) {
                Storage::delete($images);
            }
        }

        $post->categories()->detach();
        $post->delete();
        Toastr::success('Post Successfully Deleted.', 'success');
        return redirect()->back();
    }
}
