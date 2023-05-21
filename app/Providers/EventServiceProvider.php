<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\NewIncomingRequest;
use App\Listeners\AnalyseRequest;

use App\Events\UrlRequestRaised;
use App\Listeners\UrlRequestRaisedListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        UrlRequestRaised::class => [
            UrlRequestRaisedListener::class,
        ],
        NewIncomingRequest::class => [
            AnalyseRequest::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
