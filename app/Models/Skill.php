<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name'];


    public function playlists()
    {
        return $this->belongsToMany(Playlist::class,'skill_playlists','skill_id','playlist_id');
    }
}
