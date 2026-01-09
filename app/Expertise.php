<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Expertise extends Model
{
    
    protected $fillable = ['label', 'order', 'description'];
    protected $table = 'expertise';

    public function casestudies()
    {
        return $this->belongsToMany('App\Casestudy', 'casestudy_expertise');
    }

    public function getUrlAttribute()
    {
    	return route('expertise.article', ['expertise' => $this->id, 'slug' => Str::slug($this->label)]);
    }

    public function getImageUrlAttribute()
    {

        if (!empty($this->image)) {
            $exists = Storage::disk('spaces')->exists($this->image);
            if ($exists) {
                return Storage::url($this->image);
            }
        }

        return image_placeholder();

    }

    static public function nextOrder()
    {
        $record = self::orderBy('order', 'desc')->first();
        if ($record) {
            return $record->order + 1;
        }
        return 1;
    }

    public function __toString()
    {
        return $this->label;
    }

}
