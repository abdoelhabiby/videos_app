<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class VideoComment extends Model
{

    use LogsActivity;

    protected $fillable = ['comment'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function replies()
    {
        return $this->hasMany(CommentReply::class,'comment_id','id');
    }

    public function video()
    {
        return $this->belongsTo(Video::class,'video_id','id');

    }

    protected static $logAttributes = ['*'];

    protected static $logName = 'VideoComment ';

}
