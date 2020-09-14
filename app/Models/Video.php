<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        "name",
        "description",
        "meta_keywords",
        "meta_description",
        "youtube",
        "published",
        "user_id",
        "category_id",
        "image",
    ];



    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }


    public function skills()
    {
        return $this->belongsToMany(Skill::class,'skills_videos');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'tags_videos');
    }


    public function comments()
    {
        return $this->hasMany(VideoComment::class,'video_id');
    }


}
