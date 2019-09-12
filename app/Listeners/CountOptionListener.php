<?php

namespace App\Listeners;

use App\Events\CountOption;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CountOptionListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(CountOption $event)
    {
        $option = $event->option;
        $option->update([
            'tmp_count' => $option->tmp_count+1
        ]);

        $option->vote->update([
            'tmp_count' => $option->vote->tmp_count+1
        ]);
    }
}
