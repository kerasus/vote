<?php

namespace App\Listeners;

use App\Events\MobileVerified;
use Illuminate\Queue\InteractsWithQueue;

class MobileVerifiedListener
{
    use InteractsWithQueue;

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
     * @param  MobileVerified  $event
     * @return void
     */
    public function handle(MobileVerified $event)
    {
        //
    }
}
