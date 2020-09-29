<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        "name",
        "meta_keywords",
        "meta_description",
    ];

    public function playlists()
    {
        return $this->hasMany(Playlist::class,'category_id','id');
    }
}
