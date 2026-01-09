<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class News extends Model
{

    protected $casts = [
        'publish_date' => 'date',
    ];

    public function scopeActive($query)
    {
        return $query->wherePublish(true);
    }

    public function categories()
    {
        return $this->belongsToMany('App\NewsCategory', 'news_article_categories', 'news_id', 'category_id');
    }

    public function related()
    {
        return $this->belongsToMany('App\News', 'related_news', 'news_id', 'related_news_id');
    }

    public function getUrlAttribute()
    {
        return route('news.article', ['article' => $this->id, 'slug' => Str::slug($this->title)]);
    }

    public function getListingImageUrlAttribute()
    {

        if (!empty($this->listing_image)) {
            $exists = Storage::disk('spaces')->exists($this->listing_image);
            if ($exists) {
                return Storage::url($this->listing_image);
            }
        }

        return image_placeholder();

    }

    public function getFeatureImageUrlAttribute()
    {

        if (!empty($this->feature_image)) {
            $exists = Storage::disk('spaces')->exists($this->feature_image);
            if ($exists) {
                return Storage::url($this->feature_image);
            }
        }

        return image_placeholder();

    }

    public function __toString()
    {
        return $this->title;
    }

}
