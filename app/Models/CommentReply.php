<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = ['reply'];


    public function admin()
    {
        return $this->belongsTo(Admin::class,"admin_id",'id');
    }
}
