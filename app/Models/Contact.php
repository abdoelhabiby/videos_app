<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        "name",
        "email",
        "message",
    ];

    protected $casts = [
        'replied_at' => 'datetime',
    ];

    public function replies()
    {
        return $this->hasMany(ContactReply::class,'contact_id','id');
    }
}
