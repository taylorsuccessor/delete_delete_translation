<?php
namespace App\module\authorization\middleware;

use Closure, Redirect,App,Session;



class Authorization
{
    public function handle($oRequest, Closure $fNext)
    {

        if(!canAccess(\Request::route()->getName())){

            return redirect($this->redirectTo())->withErrors([trans('general.invalidRole')]);
        }


        return $fNext($oRequest);


    }

    private function redirectTo(){

        return 'admin/login';
    }



}
