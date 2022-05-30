<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    public function redirectTo()
    {
        switch (Auth::user()->role) {
            case 'guru':
                $this->redirectTo = '/guru';
                return $this->redirectTo;
                break;
            case 'kurikulum':
                $this->redirectTo = '/kurikulum';
                return $this->redirectTo;
                break;
            case 'kepsek':
                    $this->redirectTo = '/kepsek';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login'; //if user doesn't have any role
                return $this->redirectTo;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
