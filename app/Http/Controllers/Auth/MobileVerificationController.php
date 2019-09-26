<?php

namespace App\Http\Controllers\Auth;

use App\Traits\VerifiesMobiles;
use App\Http\Controllers\Controller;

class MobileVerificationController extends Controller
{
    use VerifiesMobiles;
    protected $redirectTo = '/';
    /*
    |--------------------------------------------------------------------------
    | Mobile Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling mobile verification for any
    | user that recently registered with the application. Mobiles may also
    | be re-sent if the user didn't receive the original email message.
    |
    */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('throttle:1,1')
            ->only('resend');
        $this->middleware('throttle:10,1')
            ->only('verify');
    }
}
