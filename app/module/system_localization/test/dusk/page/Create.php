<?php
namespace App\module\system_localization\test\dusk\page;

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
        return '/admin/system_localization/create';
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
        ->type('@en','9')
            ->type('@ar','9')
    
    ->clear('@key')
    ->click('@submit')
    ->assertSee('key field is required');



    $this->browser
        ->type('@key','9')
            ->type('@ar','9')
    
    ->clear('@en')
    ->click('@submit')
    ->assertSee('en field is required');



    $this->browser
        ->type('@key','9')
            ->type('@en','9')
    
    ->clear('@ar')
    ->click('@submit')
    ->assertSee('ar field is required');


    }



    public function testCreate(){




    $this->browser->visit($this->url());

    $this->browser
            ->type('@key','9')
            ->type('@en','9')
            ->type('@ar','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@key','9')
            ->type('@en','9')
            ->type('@ar','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@key','9')
            ->type('@en','9')
            ->type('@ar','9')
    
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

    "@key"=>"[name=key]",

    "@en"=>"[name=en]",

    "@ar"=>"[name=ar]",


            '@submit'=>'[type=submit]'
        ];
    }
}
