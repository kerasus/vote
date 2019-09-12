<?php

namespace App\Observers;

use App\Events\CountOption;
use App\UserVoteOption;
use Illuminate\Support\Facades\Log;

class UserVoteOptionObserver
{
    /**
     * Handle the user vote option "created" event.
     *
     * @param  \App\UserVoteOption  $userVoteOption
     * @return void
     */
    public function created(UserVoteOption $userVoteOption)
    {
        //
    }

    /**
     * Handle the user vote option "updated" event.
     *
     * @param  \App\UserVoteOption  $userVoteOption
     * @return void
     */
    public function updated(UserVoteOption $userVoteOption)
    {
        //
    }

    /**
     * Handle the user vote option "deleted" event.
     *
     * @param  \App\UserVoteOption  $userVoteOption
     * @return void
     */
    public function deleted(UserVoteOption $userVoteOption)
    {
        //
    }

    /**
     * Handle the user vote option "restored" event.
     *
     * @param  \App\UserVoteOption  $userVoteOption
     * @return void
     */
    public function restored(UserVoteOption $userVoteOption)
    {
        //
    }

    /**
     * Handle the user vote option "force deleted" event.
     *
     * @param  \App\UserVoteOption  $userVoteOption
     * @return void
     */
    public function forceDeleted(UserVoteOption $userVoteOption)
    {
        //
    }

    public function saved(UserVoteOption $userVoteOption)
    {
        event(new CountOption($userVoteOption->option));
    }
}
