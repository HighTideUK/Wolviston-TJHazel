<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\PeopleCategory;

class TeamController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $data = [];
        $data['title'] = 'Our Team';
        $data['people'] = Person::orderBy('order')->get();

        return view('team')->with($data);
    }

    public function person(Person $person)
    {
        return view('person')->with([
            'person' => $person,
            'metaTitle' => $person->name
        ]);
    }

}
