<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Post;

class NewsController extends Controller
{
    public function blog()
    {
        // Display Blogs
        $categories = Category::all();
        $randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
        $posts = Post::latest()->approved()->published()->paginate(6);
        return view('blog.blog', compact('categories', 'randomposts', 'posts'));
    }

    public function news()
    {
        // Display News
        $newses = News::orderBy('id', 'desc')->paginate(6);
        return view('news.news', compact('newses'));
    }

    public function newsdetail($slug)
    {
        // News Detail
        $newses = News::where('slug', $slug)->first();

        if (!$newses) {
            return redirect()->route('home');
        }

        return view('news.news-detail', compact('newses'));
    }
}
