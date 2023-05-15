<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\DownloadCategory;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Milestone;
use App\Models\News;
use App\Models\Post;
use App\Models\User;

class WelcomeController extends Controller
{
    public function index()
    {
        // Display All Articles, Events and News
        $users = User::all();
        $posts = Post::approved()->published()->latest()->paginate(3);
        $events = Event::orderBy('id', 'desc')->take(3)->get();
        $newses = News::orderBy('id', 'desc')->take(3)->get();
        $milestones = Milestone::orderBy('id', 'desc')->get();
        return view('home.index', compact('users', 'posts', 'events', 'newses', 'milestones'));
    }

    public function contact()
    {
        return view('home.contact');
    }

    // View Gallery
    public function gallery()
    {
        $photos = Gallery::orderBy('original_filename', 'DESC')->paginate(12);
        return view('home.gallery', compact('photos'));
    }

    // View Downloads
    public function downloads()
    {
        // $photos = Download::orderBy('id', 'DESC')->paginate(12);
        $categories = DownloadCategory::orderBy('id', 'DESC')->paginate(9);
        return view('news.downloads', compact('categories'));
    }

    public function downloadByCategory($slug)
    {
        // $photos = Download::orderBy('id', 'DESC')->paginate(12);
        $categories = DownloadCategory::where('slug', $slug)->first();

        if ($categories) {
            $downloads = $categories->downloads()->latest()->paginate(6);
            return view('news.downloads-category', compact('categories', 'downloads'));
        } else {
            return redirect()->back();
        }
    }

    public function milestoneDetail($slug)
    {
        // Milestone Detail
        $milestones = Milestone::where('slug', $slug)->first();

        if (!$milestones) {
            return redirect()->route('home');
        }

        return view('home.milestone-detail', compact('milestones'));
    }
}
