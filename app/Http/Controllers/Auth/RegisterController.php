<?php

namespace App\Http\Controllers\Auth;

use App\Traits\RedirectTrait;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use RedirectTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * overriding method
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'first_name' => ['required', 'string', 'max:255'],
//            'last_name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile'        => ['required', 'string', 'size:11'],
            'national_code' => ['required', 'string', 'size:10'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name'        => Arr::get($data , 'first_name'),
            'last_name'         => Arr::get($data , 'last_name'),
            'email'             => Arr::get($data , 'email'),
            'mobile'            => Arr::get($data , 'mobile'),
            'national_code'     => Arr::get($data , 'national_code'),
            'password'          => Hash::make(Arr::get($data , 'national_code')),
        ]);
    }

    protected function registered(Request $request, User $user)
    {
        if ($request->expectsJson()) {
            $token = $user->getAppToken();
            $data  = array_merge([
                'user' => $user,
            ], $token);

            return response()->json([
                'status'     => 1,
                'msg'        => __('messages.database_success_insert' , ['resource' => 'کاربر']),
                'redirectTo' => $this->redirectTo($request),
                'data'       => $data,
            ], Response::HTTP_OK);
        }
    }
}
