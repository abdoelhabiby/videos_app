<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ContactReply extends Model
{
    use LogsActivity;

    protected $fillable = [
        'reply',
        'admin_id',
        'contact_id',
    ];



    protected static $logAttributes = ['*'];

    protected static $logName = 'contact reply';

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

}
