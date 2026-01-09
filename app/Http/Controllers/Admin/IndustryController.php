<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Industry;
use App\Person;
use Illuminate\Support\Facades\Log;

class IndustryController extends Controller
{
    public function getAll()
    {
    	
    	$data = [
            'industries' => Industry::orderBy('order')->paginate(20),
            'title' => 'Industries',
            'active_nav' => [
                'item' => 'industries',
                'sub_item' => 'list'
            ]
        ];

        return view('admin.industries.index')->with($data);
    }

    public function getEdit(Industry $industry)
    {

        $data = [
            'industry' => $industry,
            'title' => 'Edit Industry',
            'action' => route('admin.industry.edit_submit', ['industry' => $industry]),
            'active_nav' => [
                'item' => 'industries',
                'sub_item' => ''
            ]
        ];

        return view('admin.industries.edit')->with($data);

    }

    public function postEdit(Industry $industry, Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $message = 'Industry updated successfully';

        $industry->title = $request->input('title');
        $industry->sub_heading = $request->input('sub_heading');
        $industry->description = $request->input('description');
        $industry->save();
 
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = $request->file('image')->storePublicly('industries', 'spaces');
                $industry->image = $path;
                $industry->save();
            }
        }

        if ($request->has('remove_image')) {
            $industry->image = '';
            $industry->save();
        }

        return redirect()->back()->with('success', $message);

    }

    public function getNew()
    {

        $data = [
            'industry' => new Industry,
            'title' => 'New Industry',
            'action' => route('admin.industry.new_submit'),
            'active_nav' => [
                'item' => 'industries',
                'sub_item' => 'add'
            ]
        ];

        return view('admin.industries.edit')->with($data);

    }

    public function postNew(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $message = 'New industry created successfully';

        $industry = new Industry;
        $industry->title = $request->input('title');
        $industry->sub_heading = $request->input('sub_heading');
        $industry->description = $request->input('description');
        $industry->order = Industry::nextOrder();
        $industry->save();

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = $request->file('image')->storePublicly('industries', 'spaces');
                $category->image = $path;
                $category->save();
            }
        }

        return redirect()->route('admin.industries')->with('success', $message);

    }

    public function getDelete(Industry $industry)
    {

        $industry->casestudies()->sync([]);
        $industry->delete();

        $message = 'Industry <strong>'.$industry.'</strong> deleted successfully';

        return redirect()->route('admin.industries')->with('success', $message);

    }

    public function postUpdateOrder(Request $request)
    {
        
        if ($request->has('data')) {
            $data = $request->input('data');
            foreach ($data as $item) {
                $industry = Industry::find($item['id']);
                if ($industry) {
                    $industry->order = $item['order'];
                    $industry->save();
                }
            }
        }

        return \Response::json([
            'type' => 'success',
            'message' => 'Industry order updated'
        ]);
    }

}
