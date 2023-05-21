<?php

namespace App\Listeners;

use App\Events\NewIncomingRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AnalyseRequest implements ShouldQueue
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
     * @param  \App\Events\NewIncomingRequest  $event
     * @return void
     */
    public function handle(NewIncomingRequest $event)
    {
        $analytics = new Analytics;
        $analytics->short_url = $event->request['short_url'];
        $analytics->full_url = $event->request['full_url'];
        $analytics->request_headers = $event->request['request_headers'];
        $analytics->save();
    }
}
