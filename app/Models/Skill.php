<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Skill extends Model
{
    use LogsActivity;


    protected $fillable = ['name'];


    protected static $logAttributes = ['*'];

    protected static $logName = 'Skill ';

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class,'skill_playlists','skill_id','playlist_id');
    }
}
