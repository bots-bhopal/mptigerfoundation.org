<?php

namespace App\Http\Controllers;

class OurWorkController extends Controller
{
    public function training()
    {
        return view('our-work.training');
    }

    public function bcrlip()
    {
        return view('our-work.bcrlip');
    }

    public function tigerReserve()
    {
        return view('our-work.tiger-reserve');
    }
}
