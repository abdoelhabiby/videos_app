<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Page extends Model
{
    use LogsActivity;

    protected $fillable = [
        "name",
        "description",
        "meta_keywords",
        "meta_description",
        "image",
    ];



    protected static $logAttributes = ['*'];

    protected static $logName = 'Page ';
}
