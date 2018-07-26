<?php
namespace App\module\authentication\middleware;

use Closure, Redirect,App,Session;
use App\module\user\model\User ;
use Illuminate\Http\JsonResponse;


class ApiAuthentication
{
    public function handle($oRequest, Closure $fNext)
    {


        $oUser=User::where('token',$oRequest->header('token'))->first();


        if(!count($oUser) || $oRequest->header('token')==null){
            return new JsonResponse(['status'=>'forbidden'],403);
        }
        return $fNext($oRequest);


    }



}
