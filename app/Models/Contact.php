<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Contact extends Model
{
    use LogsActivity;

    protected $fillable = [
        "name",
        "email",
        "message",
    ];

    protected $casts = [
        'replied_at' => 'datetime',
    ];


    protected static $logAttributes = ['*'];

    protected static $logName = 'contact';

    public function replies()
    {
        return $this->hasMany(ContactReply::class,'contact_id','id');
    }
}
