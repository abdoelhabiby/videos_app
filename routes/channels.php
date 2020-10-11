<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('channel-comment-reply.{id}', function ($user, $id) {

    return (int) $user->id === (int) $id;

    return true;

});





 Broadcast::channel('admin.{id}', function ($admin, $id) {

     return (int) $admin->id === (int) $id;
}, ['guards' => ['web', 'admin']]);
