<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expertise;

class ExpertiseController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('expertise');
    }

    public function article(Expertise $expertise)
    {
    	return view('expertise_article')->with([
    		'expertise' => $expertise,
            'metaTitle' => $expertise->label
    	]);
    }

}
