<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Show Dashboard Info
        $user = Auth::user();
        $posts = $user->posts;
        $popular_posts = $user->posts()
            ->withCount('comments')
            ->orderBy('view_count', 'desc')
            ->orderBy('comments_count')
            ->take(5)->get();
        $total_pending_posts = $posts->where('is_approved', false)->count();
        $all_views = $posts->sum('view_count');
        return view('author.dashboard', compact('posts', 'popular_posts', 'total_pending_posts', 'all_views'));
    }
}
