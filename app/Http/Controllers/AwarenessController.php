<?php

namespace App\Http\Controllers;

use App\Models\Awareness;

class AwarenessController extends Controller
{
    public function awareness()
    {
        // Display Event
        $awareness = Awareness::orderBy('id', 'desc')->paginate(6);
        return view('our-work.awareness', compact('awareness'));
    }

    public function awarenessdetail($slug)
    {
        // Event Detail
        $awareness = Awareness::where('slug', $slug)->first();

        if (!$awareness) {
            return redirect()->back();
        }

        return view('our-work.awareness-detail', compact('awareness'));
    }
}
