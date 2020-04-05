<?php

namespace App\Providers;

use App\Events\CountOption;
use App\Events\Authenticated;
use App\Events\MobileVerificationCodeGenerated;
use App\Events\MobileVerified;
use App\Listeners\CountOptionListener;
use App\Listeners\MobileVerificationCodeGeneratedListener;
use App\Listeners\MobileVerifiedListener;
use App\Listeners\SendMobileVerificationNotification;
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
//            SendEmailVerificationNotification::class,
            SendMobileVerificationNotification::class,
        ],
        MobileVerified::class                  => [
            MobileVerifiedListener::class,
        ],
        CountOption::class => [
            CountOptionListener::class
        ],
        MobileVerificationCodeGenerated::class => [
            MobileVerificationCodeGeneratedListener::class
        ],
        Authenticated::class => [
            SendMobileVerificationNotification::class,
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
