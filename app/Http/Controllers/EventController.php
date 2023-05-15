<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{

    public function event()
    {
        // Display Event
        $events = Event::orderBy('id', 'desc')->paginate(6);
        return view('news.event', compact('events'));
    }

    public function eventdetail($slug)
    {
        // Event Detail
        $events = Event::where('slug', $slug)->first();

        if (!$events) {
            return redirect()->back();
        }

        return view('news.event-detail', compact('events'));
    }

    public function downloads()
    {
        return view('news.downloads');
    }
}
