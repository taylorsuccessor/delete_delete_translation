<?php

namespace App\module\car\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Edit extends BasePage
{
    private $browser=null;
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/car/1/edit';
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
        $this->testEdit();

    }

    public function testValidation(){

        $this->browser
            ->clear('@email')
            ->type('@email','moh')
            ->click('@submit')
            ->assertSee('valid email');


        $this->browser
            ->clear('@name')
            ->click('@submit')
            ->assertSee('name field is required');
    }



    public function testEdit(){

        $this->browser->maximize();
        $this->browser->visit($this->url());


        $this->browser
            ->clear('@name')
            ->type('@name','moh')
            ->click('@submit')
            ->assertSee('updated');

        $this->browser->visit($this->url());


        $this->browser
            ->clear('@email')
            ->type('@email','yosif@gmail.com')
            ->click('@submit')
            ->assertSee('updated');

        $this->browser->visit($this->url());


        $this->browser
            ->clear('@type')
            ->type('@type','type9')
            ->click('@submit')
            ->assertSee('updated');

        $this->browser->visit($this->url());


        $this->browser
            ->clear('@phone')
            ->type('@phone','22222')
            ->click('@submit')
            ->assertSee('updated');
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
