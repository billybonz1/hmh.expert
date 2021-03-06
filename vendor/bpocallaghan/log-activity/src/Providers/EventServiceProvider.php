<?php

namespace Bpocallaghan\LogActivity\Providers;

use Illuminate\Support\Facades\Event;
use Bpocallaghan\LogActivity\Events\LogActivity;
use Bpocallaghan\LogActivity\Listeners\SaveActivity;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        LogActivity::class => [
            SaveActivity::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
