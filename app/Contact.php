<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{

    protected $table = 'contact';
    protected $fillable = ['name', 'email', 'phone', 'company', 'message'];

    public function __toString()
    {
        return $this->name;
    }

}
