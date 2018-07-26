<?php

namespace App\module\car\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

use App\module\car\model\Car;

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
        return '/admin/car';
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
      $result=Car::where('id','=',1)->first();

        $browser->click('@searchTabButton');

       $browser->type('@name',$result->name)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->name);



        $browser->click('@searchTabButton');

        $browser->clear('@name')
            ->type('@email',$result->email)
            ->click('@submit')
            ->assertSeeIn('@resultTable',$result->email);


        $browser->click('@searchTabButton');

        $browser->clear('@name')
            ->clear('@email')
            ->type('@type',$result->type)
            ->click('@submit')
            ->assertSeeIn('@resultTable',$result->type);


        $browser->click('@searchTabButton');

        $browser->clear('@name')
            ->clear('@email')
            ->clear('@type')
            ->type('@phone',$result->phone)
            ->click('@submit')
            ->assertSeeIn('@resultTable',$result->phone);
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

            "@name"=>"[name=name]",
            "@email"=>"[name=email]",
            "@type"=>"[name=type]",
            "@phone"=>"[name=phone]",

            "@submit"=>"[name=search]",
            "@resultTable"=>'table',

        ];
    }
}
