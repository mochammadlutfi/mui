<?php

namespace App\Http\Controllers\User\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function reset()
    // {
    //     $title = 'Lupa Password';
    //     return view('frontend/auth/reset', ['title' => $title]);
    // }
    {
        return view('frontend/login/reset');
    }
    public function verify()
    {
        return view('frontend/login/verify');
    }
}
