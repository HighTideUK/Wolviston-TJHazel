<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Casestudy;
use Illuminate\Support\Facades\Log;

class CasestudiesController extends Controller
{
    public function getAll()
    {
    	
    	$data = [
            'casestudies' => Casestudy::orderBy('publish_date', 'desc')->paginate(20),
            'title' => 'Case Studies',
            'active_nav' => [
                'item' => 'casestudies',
                'sub_item' => 'list'
            ]
        ];

        return view('admin.casestudies.index')->with($data);
    }

    public function getEdit(Casestudy $casestudy)
    {

        $data = [
            'casestudy' => $casestudy,
            'selected_expertise' => $casestudy->expertise()->pluck('expertise_id')->toArray(),
            'selected_industries' => $casestudy->industries()->pluck('industry_id')->toArray(),
            'title' => 'Edit Casestudy',
            'action' => route('admin.casestudies.edit_submit', ['casestudy' => $casestudy]),
            'active_nav' => [
                'item' => 'casestudies',
                'sub_item' => ''
            ]
        ];

        return view('admin.casestudies.edit')->with($data);

    }

    public function postEdit(Casestudy $casestudy, Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'publish_date' => 'required|date',
            'description' => 'required',
            'listing_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'feature_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $message = 'Casestudy article updated successfully';

        $casestudy->title = $request->input('title');
        $casestudy->publish_date = $request->input('publish_date');
        $casestudy->sub_heading = $request->input('sub_heading');
        $casestudy->description = $request->input('description');
 
        if ($request->hasFile('listing_image')) {
            if ($request->file('listing_image')->isValid()) {
                $path = $request->file('listing_image')->storePublicly('casestudies', 'spaces');
                $casestudy->listing_image = $path;
            }
        }

        if ($request->hasFile('feature_image')) {
            if ($request->file('feature_image')->isValid()) {
                $path = $request->file('feature_image')->storePublicly('casestudies', 'spaces');
                $casestudy->feature_image = $path;
            }
        }

        if ($request->has('remove_listing_image')) $casestudy->listing_image = '';
        if ($request->has('remove_feature_image')) $casestudy->feature_image = '';

        if ($request->has('expertise')) {
            $casestudy->expertise()->sync($request->input('expertise'));
        } else {
            $casestudy->expertise()->sync([]);
        }

        if ($request->has('industries')) {
            $casestudy->industries()->sync($request->input('industries'));
        } else {
            $casestudy->industries()->sync([]);
        }

        $casestudy->save();

        return redirect()->back()->with('success', $message);

    }

    public function getNew()
    {

        $casestudy = new Casestudy;
        $casestudy->publish_date = date('Y-m-d');

        $data = [
            'casestudy' => $casestudy,
            'selected_expertise' => [],
            'selected_industries' => [],
            'title' => 'New Casestudy',
            'action' => route('admin.casestudies.new_submit'),
            'active_nav' => [
                'item' => 'casestudies',
                'sub_item' => 'add'
            ]
        ];

        return view('admin.casestudies.edit')->with($data);

    }

    public function postNew(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'publish_date' => 'required|date',
            'description' => 'required',
            'listing_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'feature_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $message = 'Casestudy created successfully';

        $casestudy = new Casestudy;
        $casestudy->title = $request->input('title');
        $casestudy->publish_date = $request->input('publish_date');
        $casestudy->sub_heading = $request->input('sub_heading');
        $casestudy->description = $request->input('description');
        $casestudy->save();

        if ($request->hasFile('listing_image')) {
            if ($request->file('listing_image')->isValid()) {
                $path = $request->file('listing_image')->storePublicly('casestudies', 'spaces');
                $casestudy->listing_image = $path;
                $casestudy->save();
            }
        }

        if ($request->hasFile('feature_image')) {
            if ($request->file('feature_image')->isValid()) {
                $path = $request->file('feature_image')->storePublicly('casestudies', 'spaces');
                $casestudy->feature_image = $path;
                $casestudy->save();
            }
        }

        if ($request->has('expertise')) {
            $casestudy->expertise()->sync($request->input('expertise'));
        } else {
            $casestudy->expertise()->sync([]);
        }

        if ($request->has('industries')) {
            $casestudy->industries()->sync($request->input('industries'));
        } else {
            $casestudy->industries()->sync([]);
        }

        return redirect()->route('admin.casestudies')->with('success', $message);

    }

    public function getDelete(Casestudy $casestudy)
    {

        $message = 'Casestudy <strong>'.$casestudy.'</strong> deleted successfully';

        $casestudy->industries()->sync([]);
        $casestudy->expertise()->sync([]);
        $casestudy->delete();

        return redirect()->route('admin.casestudies')->with('success', $message);

    }

    public function postUpdateOrder(Request $request)
    {
        
        if ($request->has('data')) {
            $data = $request->input('data');
            foreach ($data as $item) {
                $casestudy = Casestudy::find($item['id']);
                if ($casestudy) {
                    $casestudy->order = $item['order'];
                    $casestudy->save();
                }
            }
        }

        return \Response::json([
            'type' => 'success',
            'message' => 'Casestudies order updated'
        ]);
    }

}
