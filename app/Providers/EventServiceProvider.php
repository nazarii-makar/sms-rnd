<?php

namespace App\Providers;

use App\Events\ImageCreated;
use App\Events\ImageDeleted;
use App\Listeners\DeleteImageFromBigstock;
use App\Listeners\DeleteImageFromDepositphotos;
use App\Listeners\DeleteImageFromShutterstock;
use App\Listeners\PutImageToBigstock;
use App\Listeners\PutImageToDepositphotos;
use App\Listeners\PutImageToShutterstock;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ImageCreated::class => [
            PutImageToShutterstock::class,
            PutImageToBigstock::class,
            PutImageToDepositphotos::class,
        ],
        ImageDeleted::class => [
            DeleteImageFromShutterstock::class,
            DeleteImageFromBigstock::class,
            DeleteImageFromDepositphotos::class,
        ],
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
