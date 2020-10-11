<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Notifications\UserAddComment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendAdminNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle( $event)
    {



        $id = $event->data['admin_id'];

        $admin = Admin::where('id', $id)->first();

        Notification::send($admin, new UserAddComment( $event->data));

    }
}
