<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Awareness;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Display Info
        $user = Auth::user();
        $news_count = News::all()->count();
        $events_count = Event::all()->count();
        $awareness_count = Awareness::all()->count();
        $gallery_count = Gallery::all()->count();
        return view('user.dashboard', compact('news_count', 'events_count', 'awareness_count', 'gallery_count'));
    }
}
