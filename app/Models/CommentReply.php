<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CommentReply extends Model
{
    use LogsActivity;


    protected $fillable = ['reply'];


    protected static $logAttributes = ['*'];

    protected static $logName = 'comment reply';

    public function admin()
    {
        return $this->belongsTo(Admin::class, "admin_id", 'id');
    }
}
