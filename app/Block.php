<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'title', 'slug', 'content'
    ];

    public function getFormatIdAttribute()
    {
        return sprintf("%04d", $this->id);
    }

    public function __toString()
    {
        return $this->content;
    }

}
