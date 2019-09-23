<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Notifications\MobileVerified;
use App\Notifications\VerifyMobile;

class HomeController extends Controller
{
    public function debug(){
        $user = \App\User::Find(1);
        $user->notify(new VerifyMobile());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
}
