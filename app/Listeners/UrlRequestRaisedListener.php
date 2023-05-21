<?php

namespace App\Listeners;

use App\Events\UrlRequestRaised;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Jobs\AssignShortUrl;

class UrlRequestRaisedListener implements ShouldQueue
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
     * @param  \App\Events\UrlRequestRaised  $event
     * @return void
     */
    public function handle(UrlRequestRaised $event)
    {
        // @todo check if url is correct
        // remove Privacy Aware params

        // Dispatch Job to assign short url to the Request.
        AssignShortUrl::dispatch($event->url);
        
    }
}
