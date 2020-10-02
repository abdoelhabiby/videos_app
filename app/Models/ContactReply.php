<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactReply extends Model
{
    protected $fillable = [
        'reply',
        'admin_id',
        'contact_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

}
