<?php

namespace App\module\authentication\admin\api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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
    protected $redirectTo = '/home';




    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return new JsonResponse(['status'=>'forbidden'],403);
        }

        if ($this->attemptLogin($request)) {

            $newToken=str_random(60);

            \auth::user()->update(['token'=>$newToken]);
            return new JsonResponse(['status'=>'success','token'=>$newToken],200);
        }

        $this->incrementLoginAttempts($request);

        return new JsonResponse(['status'=>'forbidden',$request->all()],403);
    }

}
