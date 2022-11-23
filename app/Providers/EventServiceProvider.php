<?php

namespace App\Providers;

use App\Events\OrderRecord;
use App\Events\UpdateProductQuantity;
use App\Listeners\SendOrderConfirmationEmail;
use App\Listeners\UpdateProductAfterOrder;
use App\Listeners\UpdateProductOrderAfter;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderRecord::class=>[
          SendOrderConfirmationEmail::class,
        ],
        UpdateProductQuantity::class=>[
            UpdateProductOrderAfter::class,
        ],
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

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
