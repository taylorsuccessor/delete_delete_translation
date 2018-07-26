<?php

namespace App\module\car\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Create extends BasePage
{
    private $browser=null;
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/car/create';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $this->browser=$browser;
        $browser->assertPathIs($this->url());

        $this->testValidation();
        $this->testCreate();

    }

    public function testValidation(){

        $this->browser
            ->type('@name','moh')
            ->type('@email','moh')
            ->type('@type','moh')
            ->type('@phone','98797')
            ->click('@submit')
            ->assertSee('valid email');


        $this->browser
            ->clear('@name')
            ->type('@email','moh')
            ->type('@type','moh')
            ->type('@phone','moh')
            ->click('@submit')
            ->assertSee('name field is required');
    }



    public function testCreate(){

        $this->browser
            ->type('@name','moh')
            ->type('@email','mohmoh@gmail.com')
            ->type('@type','type')
            ->type('@phone','98797')
            ->click('@submit')
            ->assertSee('added');

        $this->browser->visit($this->url());

        $this->browser
            ->type('@name','yosif')
            ->type('@email','yosif@gmail.com')
            ->type('@type','moh')
            ->type('@phone','777777')
            ->click('@submit')
            ->assertSee('added');

        $this->browser->visit($this->url());

        $this->browser
            ->type('@name','fadi')
            ->type('@email','fadi@gmail.com')
            ->type('@type','type9')
            ->type('@phone','7777564')
            ->click('@submit')
            ->assertSee('added');

        $this->browser->visit($this->url());

        $this->browser
            ->type('@name','lara')
            ->type('@email','lara@gmail.com')
            ->type('@type','type3')
            ->type('@phone','999')
            ->click('@submit')
            ->assertSee('added');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            "@name"=>"[name=name]",
            "@email"=>"[name=email]",
            "@type"=>"[name=type]",
            "@phone"=>"[name=phone]",

            '@submit'=>'[type=submit]'
        ];
    }
}
