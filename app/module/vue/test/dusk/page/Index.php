<?php
namespace App\module\vue\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

use App\module\vue\model\Vue;

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
        return '/admin/vue';
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
      $result=Vue::where('id','=',1)->first();




        $browser->click('@searchTabButton');

       $browser->type('@email',$result->email)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->email);


        $browser->click('@searchTabButton');

       $browser->type('@password',$result->password)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->password);


        $browser->click('@searchTabButton');

       $browser->type('@name',$result->name)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->name);


        $browser->click('@searchTabButton');

       $browser->type('@birth_day',$result->birth_day)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->birth_day);


        $browser->click('@searchTabButton');

       $browser->type('@phone',$result->phone)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->phone);


        $browser->click('@searchTabButton');

       $browser->type('@gender',$result->gender)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->gender);



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


    "@email"=>"[name=email]",

    "@password"=>"[name=password]",

    "@name"=>"[name=name]",

    "@birth_day"=>"[name=birth_day]",

    "@phone"=>"[name=phone]",

    "@gender"=>"[name=gender]",
            "@submit"=>"[name=search]",
            "@resultTable"=>'table',

        ];
    }
}
