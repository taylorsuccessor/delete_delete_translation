<?php
namespace App\module\system_localization\test\dusk\page;

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
        return '/admin/system_localization/1/edit';
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
    ->clear('@key')
    ->click('@submit')
    ->assertSee('key field is required');


    $this->browser
    ->clear('@en')
    ->click('@submit')
    ->assertSee('en field is required');


    $this->browser
    ->clear('@ar')
    ->click('@submit')
    ->assertSee('ar field is required');



    }



    public function testEdit(){





    $this->browser->visit($this->url());


    $this->browser
    ->clear('@key')
    ->type('@key','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@en')
    ->type('@en','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@ar')
    ->type('@ar','9')
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
              
             "@key"=>"[name=key]",
             
             "@en"=>"[name=en]",
             
             "@ar"=>"[name=ar]",
                         '@submit'=>'[type=submit]'
             ];
      }
}
