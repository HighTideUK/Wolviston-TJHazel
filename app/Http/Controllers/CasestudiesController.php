<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Casestudy;
use App\Expertise;
use App\Industry;
use Illuminate\Support\Facades\Log;

class CasestudiesController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        
        $data = [];

        $data['industryRecords'] = Industry::orderBy('order')->get();
        $data['industry'] = false;

        $casestudies = Casestudy::active()->orderBy('publish_date', 'desc')->get();

        /*
        if (count($casestudies) < 3) {
            // add some placeholders
            for ($i = count($casestudies); $i < 3; $i++) {
                $casestudy = new Casestudy;
                $casestudy->placeholder = true;
                $casestudies[] = $casestudy;
            }
        }
        */

        $data['casestudies'] = $casestudies;

        return view('casestudies')->with($data);
    }

    public function industry(Industry $industry)
    {
        
        $data = [];
        $data['industry'] = $industry;
        $data['industryRecords'] = Industry::orderBy('order')->get();

        $casestudies = $industry->casestudies()->active()->get();
        
        /*
        if (count($casestudies) < 3) {
            // add some placeholders
            for ($i = count($casestudies); $i < 3; $i++) {
                $casestudy = new Casestudy;
                $casestudy->placeholder = true;
                $casestudies[] = $casestudy;
            }
        }
        */

        $data['casestudies'] = $casestudies;

        return view('casestudies')->with($data);
    }

    public function expertise(Expertise $expertise)
    {
        
        $data = [];
        $data['expertise'] = $expertise;
        $data['expertiseRecords'] = Expertise::orderBy('order')->get();

        $casestudies = $expertise->casestudies()->active()->get();
        if (count($casestudies) < 3) {
            // add some placeholders
            for ($i = count($casestudies); $i < 3; $i++) {
                $casestudy = new Casestudy;
                $casestudy->placeholder = true;
                $casestudies[] = $casestudy;
            }
        }

        $data['casestudies'] = $casestudies;

        return view('casestudies')->with($data);
    }

    public function article(Casestudy $casestudy)
    {
    	return view('casestudy_article')->with([
    		'casestudy' => $casestudy,
            'metaTitle' => $casestudy->title
    	]);
    }

}
