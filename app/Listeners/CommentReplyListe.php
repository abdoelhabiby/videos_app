<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\CommentReplyEvent;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\CommentReplyNotify;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentReplyListe
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
    public function handle(CommentReplyEvent $event)
    {


        $user = User::where('id',$event->comment->user_id)->first();

        if($user){

             $data = [
                 "title" => admin()->name . " repliyed form your comment in video " . $event->comment->video->name,
                 "video_id" => $event->comment->video_id,
                 "comment_id" => $event->comment->id,
             ];

            $user->notify(new CommentReplyNotify($data));

        }
    }
}
