<?php

namespace App\Http\Controllers;

class KnowMoreController extends Controller
{
    public function about_mptfs()
    {
        return view('know-more.about_mptfs');
    }

    public function organizationalStructure()
    {
        return view('know-more.organizational_structure');
    }

    public function tigerState()
    {
        return view('know-more.tiger_state_mp');
    }
}
