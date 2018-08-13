<?php
namespace App\module\system_localization\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

use App\module\system_localization\model\SystemLocalization;

class Index extends BasePage
{
    private $browser=null;
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/system_localization';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
      $result=SystemLocalization::where('id','=',1)->first();




        $browser->click('@searchTabButton');

       $browser->type('@key',$result->key)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->key);


        $browser->click('@searchTabButton');

       $browser->type('@en',$result->en)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->en);


        $browser->click('@searchTabButton');

       $browser->type('@ar',$result->ar)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->ar);



    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [

            "@searchTabButton"=>'.right-side-toggle',


    "@key"=>"[name=key]",

    "@en"=>"[name=en]",

    "@ar"=>"[name=ar]",
            "@submit"=>"[name=search]",
            "@resultTable"=>'table',

        ];
    }
}
