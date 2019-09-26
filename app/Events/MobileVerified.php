<?php

namespace App\Events;

use App\Classes\Verification\MustVerifyMobileNumber;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MobileVerified
{
    use Dispatchable, SerializesModels;

    /**
     * The verified user.
     *
     * @var MustVerifyMobileNumber
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param  MustVerifyMobileNumber  $user
     *
     * @return void
     */
    public function __construct(MustVerifyMobileNumber $user)
    {
        $this->user = $user;
    }
}
