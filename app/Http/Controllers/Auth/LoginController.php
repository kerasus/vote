<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Api\IndexPageController;
use App\Http\Controllers\Controller;
use App\Traits\RedirectTrait;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use RedirectTrait;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function logout(Request $request)
    {
        $this->guard()
            ->logout();

        if ($request->expectsJson()) {
            //TODO:// revoke all apps!!!
            $request->user()
                ->token()
                ->revoke();
        }
        else {
            $request->session()
                ->invalidate();
        }

        return $this->loggedOut($request) ?: redirect('/');
    }

    /**
     * The user has logged out of the application.
     *
     * @param Request $request
     *
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'status'     => 1,
                'msg'        => __('messages.user_signed_out'),
                'redirectTo' => action('\\'.IndexPageController::class),
            ], Response::HTTP_OK);
        }
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     *
     *
     * @param RegisterController $registerController
     *
     * @return RedirectResponse|Response|JsonResponse
     *
     * @throws ValidationException
     */
    public function login(Request $request, RegisterController $registerController)
    {
        $request->offsetSet('password', $request->get('national_code'));
        /**
         * Validating mobile and password strings
         */
        $this->validateLogin($request);
        /**
         * Login or register this new user
         */

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {

            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

//        Log::error('LoginController login 7');
        return $registerController->register($request);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param Request $request
     *
     * @return Response
     */
    protected function sendLoginResponse(Request $request)
    {
        if (!$request->expectsJson()) {
            $request->session()
                ->regenerate();
        }
        $this->clearLoginAttempts($request);
        return $this->authenticated($request, $this->guard()
            ->user()) ?: redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param Request $request
     * @param  mixed                     $user
     *
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if (!$request->expectsJson()) {
            return redirect($this->redirectTo($request));
        }

        $token = $user->getAppToken();
        $data  = array_merge([
            'user' => $user,
        ], $token);
        return response()->json([
            'status'     => 1,
            'msg'        => __('messages.user_signed_in'),
            'redirectTo' => $this->redirectTo($request),
            'data'       => $data,
        ], Response::HTTP_OK);
    }

    /**
     * Show the application login form.
     *
     * @return Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param Request $request
     *
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), $this->password() , 'password');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'mobile';
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function password()
    {
        return 'national_code';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            $this->password() => 'required|string',
        ]);
    }
}
