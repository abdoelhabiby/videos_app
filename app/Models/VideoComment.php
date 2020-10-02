<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoComment extends Model
{

    protected $fillable = ['comment'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id')->select('name','id');
    }


    public function replies()
    {
        return $this->hasMany(CommentReply::class,'comment_id','id');
    }

    public function video()
    {
        return $this->belongsTo(Video::class,'video_id','id');

    }
}
