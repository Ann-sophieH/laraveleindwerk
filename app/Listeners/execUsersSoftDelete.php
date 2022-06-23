<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class execUsersSoftDelete
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
    public function handle($event)
    {
        // deletes all photos  connected to th deleted users
        $userId = $event->user->id;
        $event->user->photos()->delete();
        $event->user->posts()->where('user_id', $userId)->delete();

    }
}
