<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Person;
use App\PeopleCategory;
use Illuminate\Support\Facades\Log;

class PeopleController extends Controller
{
    public function getAll()
    {
    	
    	$data = [
            'people' => Person::orderBy('order')->paginate(20),
            'title' => 'People',
            'active_nav' => [
                'item' => 'people',
                'sub_item' => 'list'
            ]
        ];

        return view('admin.people.index')->with($data);
    }

    public function getEdit(Person $person)
    {

        $data = [
            'person' => $person,
            'selected_casestudies' => $person->casestudies()->pluck('casestudy_id')->toArray(),
            'title' => 'Edit Person',
            'action' => route('admin.person.edit_submit', ['person' => $person]),
            'active_nav' => [
                'item' => 'people',
                'sub_item' => ''
            ]
        ];

        return view('admin.people.edit')->with($data);

    }

    public function postEdit(Person $person, Request $request)
    {

        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $message = 'Person updated successfully';

        $person->first_name = $request->input('first_name');
        $person->last_name = $request->input('last_name');
        $person->telephone = $request->input('telephone');
        $person->email = $request->input('email');
        $person->role = '';
        if (!empty($request->input('role'))) $person->role = $request->input('role');
        $person->bio = $request->input('bio');
        $person->twitter = $request->input('twitter');
        $person->linkedin = $request->input('linkedin');
        $person->facebook = $request->input('facebook');

        if ($request->input('category')) {
            $category = PeopleCategory::find($request->input('category'));
            if ($category) {
                $person->category()->associate($category);
            }
        }

        $person->save();
 
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = $request->file('image')->storePublicly('people', 'spaces');
                $person->image = $path;
                $person->save();
            }
        }

        if ($request->has('remove_image')) {
            $person->image = '';
            $person->save();
        }

        if ($request->has('casestudies')) {
            $person->casestudies()->sync($request->input('casestudies'));
        } else {
            $person->casestudies()->sync([]);
        }

        return redirect()->back()->with('success', $message);

    }

    public function getNew()
    {

        $data = [
            'person' => new Person,
            'title' => 'New Person',
            'selected_casestudies' => [],
            'action' => route('admin.person.new_submit'),
            'active_nav' => [
                'item' => 'people',
                'sub_item' => 'add'
            ]
        ];

        return view('admin.people.edit')->with($data);

    }

    public function postNew(Request $request)
    {

        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255'
        ]);

        $message = 'New person created successfully';

        $person = new Person;
        $person->first_name = $request->input('first_name');
        $person->last_name = $request->input('last_name');
        $person->telephone = $request->input('telephone');
        $person->email = $request->input('email');
        $person->role = '';
        if (!empty($request->input('role'))) $person->role = $request->input('role');
        $person->order = Person::nextOrder();
        $person->bio = $request->input('bio');
        $person->image = '';
        $person->twitter = $request->input('twitter');
        $person->linkedin = $request->input('linkedin');
        $person->facebook = $request->input('facebook');
        $person->save();

        if ($request->input('category')) {
            $category = PeopleCategory::find($request->input('category'));
            if ($category) {
                $person->category()->associate($category);
                $person->save();
            }
        }

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = $request->file('image')->storePublicly('people', 'spaces');
                $person->image = $path;
                $person->save();
            }
        }

        if ($request->has('casestudies')) {
            $person->casestudies()->sync($request->input('casestudies'));
        }

        return redirect()->route('admin.people')->with('success', $message);

    }

    public function getDelete(Person $person)
    {

        $message = 'Person <strong>'.$person.'</strong> deleted successfully';
        $person->delete();

        return redirect()->route('admin.people')->with('success', $message);

    }

    public function postUpdateOrder(Request $request)
    {
        
        if ($request->has('data')) {
            $data = $request->input('data');
            foreach ($data as $item) {
                $person = Person::find($item['id']);
                if ($person) {
                    $person->order = $item['order'];
                    $person->save();
                }
            }
        }

        return \Response::json([
            'type' => 'success',
            'message' => 'People order updated'
        ]);
    }

}
