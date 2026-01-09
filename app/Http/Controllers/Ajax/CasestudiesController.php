<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Casestudy;
use App\Expertise;
use App\Industry;

class CasestudiesController extends Controller
{

    public function all()
    {
        
        $casestudies = Casestudy::active()->orderBy('publish_date', 'desc')->get();
        $view = view('partials.casestudies', ['casestudies' => $casestudies])->render();

        return response()->json([
            'type' => 'success',
            'view' => $view
        ]);

    }

    public function industry(Industry $industry)
    {

        $casestudies = $industry->casestudies()->active()->get();
        $view = view('partials.casestudies', ['casestudies' => $casestudies])->render();
        return response()->json([
            'type' => 'success',
            'view' => $view
        ]);
        
    }

}
