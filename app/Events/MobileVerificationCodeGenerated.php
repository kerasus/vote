<?php

namespace App\Events;

use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class MobileVerificationCodeGenerated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $generationTime;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param $generationTime
     */
    public function __construct(User $user , $generationTime=null)
    {
        $this->user = $user;
        $this->generationTime = $generationTime;
    }

}
