<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function details($slug)
    {
        // Article Details
        $post = Post::where('slug', $slug)->approved()->published()->first();

        if ($post) {
            $post = Post::where('slug', $slug)->approved()->published()->first();
            $blogKey = 'blog_' . $post->id;

            if (!Session::has($blogKey)) {
                $post->increment('view_count');
                Session::put($blogKey, 1);
            }
            $randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
            $categories = Category::all();
            return view('blog.post', compact('post', 'randomposts', 'categories'));
        } else {
            return redirect()->back();
        }
    }

    public function postByCategory($slug)
    {
        $categories = Category::where('slug', $slug)->first();

        if ($categories) {
            $posts = $categories->posts()->approved()->published()->latest()->paginate(6);
            return view('blog.category', compact('categories', 'posts'));
        } else {
            return redirect()->back();
        }
    }
}
