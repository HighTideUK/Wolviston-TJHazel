<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\PeopleCategory;
use App\Person;

class TeamController extends Controller
{

    public function all()
    {
        
        $people = Person::orderBy('order')->get();
        $view = view('partials.team_members', ['people' => $people])->render();

        return response()->json([
            'type' => 'success',
            'view' => $view
        ]);

    }

    public function category(PeopleCategory $category)
    {
        
        $people = $category->people()->orderBy('order')->get();
        $view = view('partials.team_members', ['people' => $people])->render();

        return response()->json([
            'type' => 'success',
            'view' => $view
        ]);

    }

}
