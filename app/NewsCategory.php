<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsCategory extends Model
{

    public function __toString()
    {
        return $this->label;
    }

    public function news()
    {
    	return $this->belongsToMany('App\News', 'news_article_categories', 'news_id', 'category_id');
    }

    public function getUrlAttribute()
    {
        return route('news.category', ['category' => $this->id, 'slug' => Str::slug($this->label)]);
    }

}
