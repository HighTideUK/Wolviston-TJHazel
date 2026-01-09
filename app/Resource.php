<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Resource extends Model
{

    public function scopeActive($query)
    {
        return $query->wherePublish(true);
    }

    public function getUrlAttribute()
    {

        if (!empty($this->filename)) {
            $exists = Storage::disk('spaces')->exists($this->filename);
            if ($exists) {
                return Storage::url($this->filename);
            }
        }

        return false;

    }

    public function getDownloadUrlAttribute()
    {
        return route('download', ['resource' => $this->id]);
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
