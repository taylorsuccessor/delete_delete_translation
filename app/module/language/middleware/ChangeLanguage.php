<?php namespace App\module\language\Middleware;

use Closure, Redirect,App,Session;
use Illuminate\Support\Facades\DB;

class ChangeLanguage
{
    public function handle($oRequest, Closure $fNext)
    {


        $locale = ($oRequest->has('locale')) ? $oRequest->locale : false;
        $back = $this->setLocale($locale);

        if ($back == 'back') {
            return Redirect::back();
        }

        return $fNext($oRequest);


    }


    private function setLocale($locale)
    {
        if ($locale) {
            Session::put('locale', $locale);
            return 'back';
        } else if (!Session::has('locale')) {
            Session::put('locale', 'en');
        }


        App::setLocale(Session::get('locale'));

    }

}
