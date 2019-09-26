<?php

namespace App\Listeners;

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
        $timeStamp = $event->generationTime;
        $user = $event->user;
//        Carbon::createFromTimestamp($timeStamp);
        Log::info('MobileVerificationCodeGeneratedListener : '.$user->id.' - '.$timeStamp);
    }
}
