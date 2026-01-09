<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NewsCategory;
use Illuminate\Support\Facades\Log;

class NewsCategoryController extends Controller
{
    public function getAll()
    {
    	
    	$data = [
            'categories' => NewsCategory::orderBy('label')->paginate(20),
            'title' => 'News Categories',
            'active_nav' => [
                'item' => 'news',
                'sub_item' => 'list_categories'
            ]
        ];

        return view('admin.news_categories.index')->with($data);
    }

    public function getEdit(NewsCategory $category)
    {

        $data = [
            'category' => $category,
            'title' => 'Edit News Category',
            'action' => route('admin.news_category.edit_submit', ['category' => $category]),
            'active_nav' => [
                'item' => 'news',
                'sub_item' => ''
            ]
        ];

        return view('admin.news_categories.edit')->with($data);

    }

    public function postEdit(NewsCategory $category, Request $request)
    {

        $validatedData = $request->validate([
            'label' => 'required|max:255'
        ]);

        $message = 'Category updated successfully';

        $category->label = $request->input('label');
        $category->save();

        return redirect()->back()->with('success', $message);

    }

    public function getNew()
    {

        $category = new NewsCategory;

        $data = [
            'category' => $category,
            'title' => 'New Category',
            'action' => route('admin.news_category.new_submit'),
            'active_nav' => [
                'item' => 'news',
                'sub_item' => 'add_category'
            ]
        ];

        return view('admin.news_categories.edit')->with($data);

    }

    public function postNew(Request $request)
    {

        $validatedData = $request->validate([
            'label' => 'required|max:255'
        ]);

        $message = 'Category created successfully';

        $category = new NewsCategory;
        $category->label = $request->input('label');
        $category->save();

        return redirect()->route('admin.news_categories')->with('success', $message);

    }

    public function getDelete(NewsCategory $category)
    {

        $message = 'Category <strong>'.$category.'</strong> deleted successfully';
        $category->delete();

        return redirect()->route('admin.news_categories')->with('success', $message);

    }

    public function postUpdateOrder(Request $request)
    {
        
        if ($request->has('data')) {
            $data = $request->input('data');
            foreach ($data as $item) {
                $category = NewsCategory::find($item['id']);
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
