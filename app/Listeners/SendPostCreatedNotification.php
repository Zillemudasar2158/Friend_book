<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostCreatedNotification
{
    public function handle(PostCreated $event)
    {
        Log::info("New Post created: ".$event->post->title);
    }
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle1(object $a): void
    {
        //
    }
}
