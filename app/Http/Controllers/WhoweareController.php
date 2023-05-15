<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhoweareController extends Controller
{
    public function about_mptfs()
    {
        return view('who_we_are/about_mptfs');
    }

    public function governing_body()
    {
        return view('who_we_are/governing_body');
    }

    public function project_tiger()
    {
        return view('who_we_are/project_tiger');
    }
}
