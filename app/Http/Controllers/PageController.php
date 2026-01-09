<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function terms()
    {
        return $this->renderPage('terms');
    }

    public function careers()
    {
        return $this->renderPage('careers');
    }

    public function getPage($slug) 
    {
		return $this->renderPage($slug);
    }

    private function renderPage($slug)
    {
        
        $page = Page::whereSlug($slug)->first();

        if (!$page) return abort(404);

        return view('page')->with([
            'page' => $page,
            'metaTitle' => $page->title
        ]);
    }

}
