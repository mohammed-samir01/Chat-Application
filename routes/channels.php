<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('conversations.{id}', function ($user, $id) {
    return  $user->inConversation($id);
});
