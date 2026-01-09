<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PeopleCategory extends Model
{

	public $timestamps = false;

	public function people()
	{
		return $this->hasMany('App\Person', 'category_id');
	}

	public function getUrlAttribute()
    {
        return route('people.category', ['category' => $this->id, 'slug' => Str::slug($this->label)]);
    }

    public function __toString()
    {
        return $this->label;
    }

}
