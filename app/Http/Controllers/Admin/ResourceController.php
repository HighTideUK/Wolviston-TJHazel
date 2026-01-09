<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resource;
use Illuminate\Support\Facades\Log;

class ResourceController extends Controller
{
    public function getAll()
    {
    	
    	$data = [
            'resources' => Resource::orderBy('order')->paginate(20),
            'title' => 'Downloads',
            'active_nav' => [
                'item' => 'resources',
                'sub_item' => 'list'
            ]
        ];

        return view('admin.resources.index')->with($data);
    }

    public function getEdit(Resource $resource)
    {

        $data = [
            'resource' => $resource,
            'title' => 'Edit Download',
            'action' => route('admin.resource.edit_submit', ['resource' => $resource]),
            'active_nav' => [
                'item' => 'resources',
                'sub_item' => ''
            ]
        ];

        return view('admin.resources.edit')->with($data);

    }

    public function postEdit(Resource $resource, Request $request)
    {

        $validatedData = $request->validate([
            'label' => 'required|max:255',
            'file' => 'sometimes|file|mimes:doc,docx,pdf|max:2048',
        ]);

        $message = 'Download updated successfully';

        $resource->label = $request->input('label');
        $resource->description = $request->input('description');
        $resource->publish = $request->has('publish');
        $resource->save();
 
        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $path = $request->file('file')->storePublicly('resources', 'spaces');
                $resource->filename = $path;
                $resource->save();
            }
        }

        if ($request->has('remove_file')) {
            $resource->filename = '';
            $resource->save();
        }

        return redirect()->back()->with('success', $message);

    }

    public function getNew()
    {

        $resource = new Resource;
        $resource->publish = true;

        $data = [
            'resource' => $resource,
            'title' => 'New Download',
            'action' => route('admin.resource.new_submit'),
            'active_nav' => [
                'item' => 'resources',
                'sub_item' => 'add'
            ]
        ];

        return view('admin.resources.edit')->with($data);

    }

    public function postNew(Request $request)
    {

        $validatedData = $request->validate([
            'label' => 'required|max:255',
            'file' => 'sometimes|file|mimes:doc,docx,pdf|max:2048'
        ]);

        $message = 'New download created successfully';

        $resource = new Resource;
        $resource->label = $request->input('label');
        $resource->description = $request->input('description');
        $resource->order = Resource::nextOrder();
        $resource->filename = '';
        $resource->publish = $request->has('publish');
        $resource->save();

        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $path = $request->file('file')->storePublicly('resources', 'spaces');
                $resource->filename = $path;
                $resource->save();
            }
        }

        return redirect()->route('admin.resources')->with('success', $message);

    }

    public function getDelete(Resource $resource)
    {

        $message = 'Download <strong>'.$resource.'</strong> deleted successfully';
        $resource->delete();

        return redirect()->route('admin.resources')->with('success', $message);

    }

    public function postUpdateOrder(Request $request)
    {
        
        if ($request->has('data')) {
            $data = $request->input('data');
            foreach ($data as $item) {
                $resource = Resource::find($item['id']);
                if ($resource) {
                    $resource->order = $item['order'];
                    $resource->save();
                }
            }
        }

        return \Response::json([
            'type' => 'success',
            'message' => 'Downloads order updated'
        ]);
    }

}
