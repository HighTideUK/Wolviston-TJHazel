<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function getAll()
    {
    	
    	$data = [
            'news' => News::orderBy('publish_date', 'desc')->paginate(20),
            'title' => 'News',
            'active_nav' => [
                'item' => 'news',
                'sub_item' => 'list'
            ]
        ];

        return view('admin.news.index')->with($data);
    }

    public function getEdit(News $news)
    {

        $data = [
            'news' => $news,
            'selected_categories' => $news->categories()->pluck('category_id')->toArray(),
            'related' => $news->related()->pluck('related_news_id')->toArray(),
            'title' => 'Edit News',
            'action' => route('admin.news.edit_submit', ['news' => $news]),
            'active_nav' => [
                'item' => 'news',
                'sub_item' => ''
            ]
        ];

        return view('admin.news.edit')->with($data);

    }

    public function postEdit(News $news, Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'publish_date' => 'required|date',
            'description' => 'required',
            'listing_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'feature_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $message = 'News article updated successfully';

        $news->title = $request->input('title');
        $news->publish_date = $request->input('publish_date');
        $news->summary = $request->input('summary');
        $news->description = $request->input('description');
        $news->publish = $request->has('publish');
 
        if ($request->hasFile('listing_image')) {
            if ($request->file('listing_image')->isValid()) {
                $path = $request->file('listing_image')->storePublicly('news', 'spaces');
                $news->listing_image = $path;
            }
        }

        if ($request->hasFile('feature_image')) {
            if ($request->file('feature_image')->isValid()) {
                $path = $request->file('feature_image')->storePublicly('news', 'spaces');
                $news->feature_image = $path;
            }
        }

        if ($request->has('remove_listing_image')) $news->listing_image = '';
        if ($request->has('remove_feature_image')) $news->feature_image = '';

        if ($request->has('categories')) {
            $news->categories()->sync($request->input('categories'));
        } else {
            $news->categories()->sync([]);
        }

        if ($request->has('related')) {
            $news->related()->sync($request->input('related'));
        } else {
            $news->related()->sync([]);
        }

        $news->save();

        return redirect()->back()->with('success', $message);

    }

    public function getNew()
    {

        $news = new News;
        $news->publish_date = date('Y-m-d');
        $news->publish = true;

        $data = [
            'news' => $news,
            'selected_categories' => [],
            'related' => [],
            'title' => 'New News Article',
            'action' => route('admin.news.new_submit'),
            'active_nav' => [
                'item' => 'news',
                'sub_item' => 'add'
            ]
        ];

        return view('admin.news.edit')->with($data);

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

        $message = 'News article created successfully';

        $news = new News;
        $news->title = $request->input('title');
        $news->publish_date = $request->input('publish_date');
        $news->summary = $request->input('summary');
        $news->description = $request->input('description');
        $news->publish = $request->has('publish');
        $news->save();


        if ($request->hasFile('listing_image')) {
            if ($request->file('listing_image')->isValid()) {
                $path = $request->file('listing_image')->storePublicly('news', 'spaces');
                $news->listing_image = $path;
                $news->save();
            }
        }

        if ($request->hasFile('feature_image')) {
            if ($request->file('feature_image')->isValid()) {
                $path = $request->file('feature_image')->storePublicly('news', 'spaces');
                $news->feature_image = $path;
                $news->save();
            }
        }

        if ($request->has('categories')) {
            $news->categories()->sync($request->input('categories'));
        } else {
            $news->categories()->sync([]);
        }

        if ($request->has('related')) {
            $news->related()->sync($request->input('related'));
        }

        return redirect()->route('admin.news')->with('success', $message);

    }

    public function getDelete(News $news)
    {

        $message = 'News <strong>'.$news.'</strong> deleted successfully';
        $news->delete();

        return redirect()->route('admin.news')->with('success', $message);

    }

    public function postUpdateOrder(Request $request)
    {
        
        if ($request->has('data')) {
            $data = $request->input('data');
            foreach ($data as $item) {
                $news = News::find($item['id']);
                if ($news) {
                    $news->order = $item['order'];
                    $news->save();
                }
            }
        }

        return \Response::json([
            'type' => 'success',
            'message' => 'News order updated'
        ]);
    }

}
