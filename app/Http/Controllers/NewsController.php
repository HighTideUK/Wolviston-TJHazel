<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\NewsCategory;

class NewsController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $articles = News::active()->orderBy('publish_date', 'desc')->paginate(20);

        return view('news')->with([
            'articles' => $articles,
            'selectedCategory' => null,
            'metaTitle' => 'Latest News'
        ]);

    }

    public function category(NewsCategory $category)
    {
        
        $articles = $category->news()->active()->orderBy('publish_date', 'desc')->paginate(20);

        return view('news')->with([
            'articles' => $articles,
            'selectedCategory' => $category,
            'metaTitle' => $category->title
        ]);

    }

    public function article(News $article, $slug = '')
    {
        return view('news_article')->with([
            'article' => $article,
            'metaTitle' => $article->title
        ]);
    }

}
