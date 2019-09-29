<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\MobileVerificationCodeGenerated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class MobileVerificationCodeGeneratedListener
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MobileVerificationCodeGenerated $event)
    {
//        $timeStamp = Carbon::createFromTimestamp($event->generationTime);
//        $user = $event->user;
    }
}
