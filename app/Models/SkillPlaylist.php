<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SkillPlaylist extends Model
{
    use LogsActivity;


    protected static $logAttributes = ['*'];

    protected static $logName = 'SkillPlaylist ';
}
