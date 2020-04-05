<?php

namespace App\Http\Middleware;

use App\Classes\Verification\MustVerifyMobileNumber;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class EnsureMobileIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @param null $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next ,$redirectToRoute = null)
    {
        if (! $request->user() || ($request->user() instanceof MustVerifyMobileNumber && ! $request->user()->hasVerifiedMobile())) {
            return $request->expectsJson() ? abort(Response::HTTP_UNAUTHORIZED, __('messages.mobile_is_not_verified')) :
                Redirect::route($redirectToRoute ?: 'verification.mobile.notice');
        }

        return $next($request);
    }
}
