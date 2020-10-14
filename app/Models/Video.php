<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Playlist;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Video extends Model
{
    use LogsActivity;

    protected $fillable = [
        "name",
        "description",
        "meta_keywords",
        "meta_description",
        "youtube",
        "published",
        "admin_id",
        "playlist_id",
        "order",
    ];




    protected static $logAttributes = [
        "name",
        "description",
        "meta_keywords",
        "meta_description",
        "youtube",
        "published",
        "admin_id",
        "playlist_id",
        "order",
    ];

    protected static $logName = 'video';




    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }




    public function comments()
    {
        return $this->hasMany(VideoComment::class,'video_id');
    }


    public function playlist()
    {
        return $this->belongsTo(Playlist::class,'playlist_id');
    }


    public function scopeOrder($query)
    {
        return $query->orderBy('order','asc');
    }

    public function scopePublished($query)
    {
        return $query->where('published',1);
    }


}
