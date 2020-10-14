<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{

    use LogsActivity;





    protected static $logName = 'admin';

    protected $fillable = [
        "name",
        "meta_keywords",
        "meta_description",
    ];

    protected static $logAttributes = [
        "*",

    ];
    public function playlists()
    {
        return $this->hasMany(Playlist::class,'category_id','id');
    }
}
