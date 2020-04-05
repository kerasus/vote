<?php


namespace App\Traits;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Events\MobileVerified;
use App\Http\Requests\SubmitVerificationCode;
use Illuminate\Foundation\Auth\RedirectsUsers;

trait VerifiesMobiles
{
    
    use RedirectsUsers;
    /**
     * Show the mobile verification notice.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    public function show(Request $request)
    {
        return $request->user()
            ->hasVerifiedMobile() ? back() : view('auth.verify');
    }
    
    /**
     * Mark the authenticated user's mobile number as verified.
     *
     * @param  SubmitVerificationCode  $request
     * @param                          $code
     *
     * @return Response
     */
    public function verify(SubmitVerificationCode $request)
    {
        $user     = $request->user();
        $verified = false;
        if ($request->code === $user->getMobileVerificationCode() && $user->markMobileAsVerified()) {
            event(new MobileVerified($user));
            $verified = true;
        }
        
        if ($verified) {
            return response()->json([
                'user'    => $user,
                'message' => __('messages.mobile_is_verified'),
            ]);
        }
        
        if($request->expectsJson() ){
            return response()->json([
                'errors' => [
                    'code' => [
                        __('messages.code_is_wrong')
                    ]
                ]
            ],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return  redirect()->route('verification.mobile.notice');
    }
    
    /**
     * Resend the mobile verification notification.
     *
     * @param  Request  $request
     *
     * @return Response
     * @throws \Exception
     */
    public function resend(Request $request)
    {
        /** @var User $user */
        $user = $request->user();
        if ($user->hasVerifiedMobile()) {
            return redirect($this->redirectPath());
        }
    
        $user->sendMobileVerificationNotification();
        
        return response()->json([
            'message' => __('messages.code_is_sent'),
        ]);
    }
}
