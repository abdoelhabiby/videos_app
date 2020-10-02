<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        "name",
        "description",
        "meta_keywords",
        "meta_description",
        "image",
    ];
}
