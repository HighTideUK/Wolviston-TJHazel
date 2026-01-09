<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Industry;

class IndustriesController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('industries');
    }

    public function industry(Industry $industry)
    {
        return view('industry')->with([
            'industry' => $industry,
            'metaTitle' => $industry->title
        ]);
    }

}
