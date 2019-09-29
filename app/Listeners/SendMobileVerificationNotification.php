<?php

namespace App\Listeners;

use App\Events\Authenticated;
use App\Classes\Verification\MustVerifyMobileNumber;
use Illuminate\Auth\Events\Registered;

class SendMobileVerificationNotification
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     *
     * @return void
     */
    public function handle($event)
    {
        if($event instanceof Registered || $event instanceof Authenticated){
            $this->sendMobileVerificationCode($event);
        }
    }
    
    /**
     * @param $event
     */
    private function sendMobileVerificationCode($event): void
    {
        if ($event->user instanceof MustVerifyMobileNumber && !$event->user->hasVerifiedMobile()) {
            $event->user->sendMobileVerificationNotification();
        }
    }
}
