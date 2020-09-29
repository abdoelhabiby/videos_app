<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable= ['name'];



   public function playlists()
    {
        return $this->belongsToMany(Playlist::class,'tag_playlists','tag_id','playlist_id');
    }

}
