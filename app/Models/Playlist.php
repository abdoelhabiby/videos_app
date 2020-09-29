<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = [
        "name",
        "image",
        "description",
        "meta_keywords",
        "meta_description",
        "category_id",
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_playlists');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_playlists');
    }

    public function videos()
    {
        return $this->hasMany(Video::class,'playlist_id','id');
    }
}
