<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
    	
        /*
        $data = [
			'active_nav' => [
				'item' => 'home',
				'sub_item' => ''
			]
		];

        return view('admin.dashboard')->with($data);
        */

        return redirect()->route('admin.people');

    }

}
