<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Tag extends Model
{
    use LogsActivity;

    protected $fillable= ['name'];


    protected static $logAttributes = ['*'];

    protected static $logName = 'Tag ';

   public function playlists()
    {
        return $this->belongsToMany(Playlist::class,'tag_playlists','tag_id','playlist_id');
    }

}
