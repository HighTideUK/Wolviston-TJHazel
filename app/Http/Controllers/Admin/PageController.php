<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    
    public function getAll()
    {
        $data = [
            'pages' => Page::orderBy('title')->paginate(25),
            'title' => 'Pages',
            'active_nav' => [
                'item' => 'pages',
                'sub_item' => 'list'
            ]
        ];

        return view('admin.pages.index')->with($data);
    }

    public function getEdit(Page $page)
    {

        $data = [
            'page' => $page,
            'title' => 'Edit Page',
            'action' => route('admin.page.edit_submit', ['page' => $page]),
            'active_nav' => [
                'item' => 'pages',
                'sub_item' => ''
            ]
        ];

        return view('admin.pages.edit')->with($data);

    }

    public function postEdit(Page $page, Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'content' => 'required'
        ]);

        $message = 'Page updated successfully';

        $page->title = $request->input('title');
        $page->slug = $request->input('slug');
        $page->content = $request->input('content');
        $page->save();

        return redirect()->back()->with('success', $message);

    }

    public function getNew()
    {

        $data = [
            'page' => new Page,
            'title' => 'New Page',
            'action' => route('admin.page.new_submit'),
            'active_nav' => [
                'item' => 'pages',
                'sub_item' => 'add'
            ]
        ];

        return view('admin.pages.edit')->with($data);

    }

    public function postNew(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'content' => 'required'
        ]);

        $message = 'New page created successfully';

        $page = new Page;
        $page->title = $request->input('title');
        $page->slug = $request->input('slug');
        $page->content = $request->input('content');
        $page->save();

        return redirect()->route('admin.pages')->with('success', $message);

    }

    public function getDelete(Page $page)
    {

        $message = 'Page deleted successfully';
        $page->delete();

        return redirect()->route('admin.pages')->with('success', $message);

    }

}
