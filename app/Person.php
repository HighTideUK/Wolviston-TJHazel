<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Person extends Model
{
    
    protected $table = 'people';

    public function casestudies()
    {
        return $this->belongsToMany('App\Casestudy', 'people_casestudies', 'person_id', 'casestudy_id');
    }

    public function category()
    {
        return $this->belongsTo('App\PeopleCategory');
    }

    public function hasSocialLinks()
    {
        if (!empty($this->twitter)) return true;
        if (!empty($this->linkedin)) return true;
        if (!empty($this->facebook)) return true;
        return false;
    }

    public function hasContactInfo()
    {

        if (!empty($this->telephone)) return true;
        if (!empty($this->email)) return true;
        if (!empty($this->facebook)) return true;
        if (!empty($this->linkedin)) return true;
        if (!empty($this->twitter)) return true;
        return false;
        
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

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getUrlAttribute()
    {
        return route('person', ['person' => $this->id, 'slug' => Str::slug($this->first_name.' '.$this->last_name)]);
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
        return $this->first_name.' '.$this->last_name;
    }

}
