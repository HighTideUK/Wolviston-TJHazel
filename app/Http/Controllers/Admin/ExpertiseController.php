<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expertise;
use Illuminate\Support\Facades\Log;

class ExpertiseController extends Controller
{
    public function getAll()
    {
    	
    	$data = [
            'expertise' => Expertise::orderBy('order')->paginate(20),
            'title' => 'Services',
            'active_nav' => [
                'item' => 'expertise',
                'sub_item' => 'list'
            ]
        ];

        return view('admin.expertise.index')->with($data);
    }

    public function getEdit(Expertise $expertise)
    {

        $data = [
            'expertise' => $expertise,
            'title' => 'Edit Service',
            'action' => route('admin.expertise.edit_submit', ['expertise' => $expertise]),
            'active_nav' => [
                'item' => 'expertise',
                'sub_item' => ''
            ]
        ];

        return view('admin.expertise.edit')->with($data);

    }

    public function postEdit(Expertise $expertise, Request $request)
    {

        $validatedData = $request->validate([
            'label' => 'required|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $message = 'Service updated successfully';

        $expertise->label = $request->input('label');
        $expertise->sub_heading = $request->input('sub_heading');
        if (!empty($request->input('description'))) {
            $expertise->description = $request->input('description');
        } else {
            $expertise->description = '';
        }
        $expertise->save();

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = $request->file('image')->storePublicly('expertise', 'spaces');
                $expertise->image = $path;
                $expertise->save();
            }
        }

        if ($request->has('remove_image')) {
            $expertise->image = '';
            $expertise->save();
        }

        return redirect()->back()->with('success', $message);

    }

    public function getNew()
    {

        $data = [
            'expertise' => new Expertise,
            'title' => 'New Service',
            'action' => route('admin.expertise.new_submit'),
            'active_nav' => [
                'item' => 'expertise',
                'sub_item' => 'add'
            ]
        ];

        return view('admin.expertise.edit')->with($data);

    }

    public function postNew(Request $request)
    {

        $validatedData = $request->validate([
            'label' => 'required|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $message = 'New service created successfully';

        $expertise = new Expertise;
        $expertise->label = $request->input('label');
        $expertise->sub_heading = $request->input('sub_heading');
        if (!empty($request->input('description'))) {
            $expertise->description = $request->input('description');
        } else {
            $expertise->description = '';
        }
        $expertise->order = Expertise::nextOrder();
        $expertise->save();

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = $request->file('image')->storePublicly('expertise', 'spaces');
                $expertise->image = $path;
                $expertise->save();
            }
        }

        return redirect()->route('admin.expertise')->with('success', $message);

    }

    public function getDelete(Expertise $expertise)
    {

        $message = '<strong>'.$expertise.'</strong> deleted successfully';

        $expertise->casestudies()->sync([]);
        $expertise->delete();

        return redirect()->route('admin.expertise')->with('success', $message);

    }

    public function postUpdateOrder(Request $request)
    {
        
        if ($request->has('data')) {
            $data = $request->input('data');
            foreach ($data as $item) {
                $expertise = Expertise::find($item['id']);
                if ($expertise) {
                    $expertise->order = $item['order'];
                    $expertise->save();
                }
            }
        }

        return \Response::json([
            'type' => 'success',
            'message' => 'Order updated'
        ]);
    }

}
