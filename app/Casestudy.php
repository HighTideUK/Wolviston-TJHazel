<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Casestudy extends Model
{

    protected $table = 'casestudies';

    protected $casts = [
        'publish_date' => 'date',
    ];

    public function expertise()
    {
        return $this->belongsToMany('App\Expertise', 'casestudy_expertise', 'casestudy_id', 'expertise_id');
    }

    public function industries()
    {
        return $this->belongsToMany('App\Industry', 'casestudy_industries', 'casestudy_id', 'industry_id');
    }

    public function scopeActive($query)
    {
        return $query->wherePublish(true);
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

    public function getUrlAttribute()
    {
        return route('casestudy.article', ['casestudy' => $this->id, 'slug' => Str::slug($this->title)]);
    }

    public function __toString()
    {
        return $this->title;
    }

}
