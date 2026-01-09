<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PeopleCategory;
use Illuminate\Support\Facades\Log;

class PeopleCategoryController extends Controller
{
    public function getAll()
    {
    	
    	$data = [
            'categories' => PeopleCategory::orderBy('label')->paginate(20),
            'title' => 'People Categories',
            'active_nav' => [
                'item' => 'people',
                'sub_item' => 'list_categories'
            ]
        ];

        return view('admin.people_categories.index')->with($data);
    }

    public function getEdit(PeopleCategory $category)
    {

        $data = [
            'category' => $category,
            'title' => 'Edit People Category',
            'action' => route('admin.people_categories.edit_submit', ['category' => $category]),
            'active_nav' => [
                'item' => 'people',
                'sub_item' => ''
            ]
        ];

        return view('admin.people_categories.edit')->with($data);

    }

    public function postEdit(PeopleCategory $category, Request $request)
    {

        $validatedData = $request->validate([
            'label' => 'required|max:255'
        ]);

        $message = 'People category updated successfully';

        $category->label = $request->input('label');
        $category->save();

        return redirect()->back()->with('success', $message);

    }

    public function getNew()
    {

        $category = new PeopleCategory;

        $data = [
            'category' => $category,
            'title' => 'New People Category',
            'action' => route('admin.people_categories.new_submit'),
            'active_nav' => [
                'item' => 'people',
                'sub_item' => 'add_category'
            ]
        ];

        return view('admin.people_categories.edit')->with($data);

    }

    public function postNew(Request $request)
    {

        $validatedData = $request->validate([
            'label' => 'required|max:255'
        ]);

        $message = 'People category created successfully';

        $category = new PeopleCategory;
        $category->label = $request->input('label');
        $category->save();

        return redirect()->route('admin.people_categories')->with('success', $message);

    }

    public function getDelete(PeopleCategory $category)
    {

        $category->people()->update(['category_id' => null]);

        $message = 'People category deleted successfully';
        $category->delete();

        return redirect()->route('admin.people_categories')->with('success', $message);

    }

    public function postUpdateOrder(Request $request)
    {
        
        if ($request->has('data')) {
            $data = $request->input('data');
            foreach ($data as $item) {
                $category = PeopleCategory::find($item['id']);
                if ($category) {
                    $category->order = $item['order'];
                    $category->save();
                }
            }
        }

        return \Response::json([
            'type' => 'success',
            'message' => 'Category order updated'
        ]);
    }

}
