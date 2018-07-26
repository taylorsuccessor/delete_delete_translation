<?php
namespace App\module\vue\test\dusk\page;

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
        return '/admin/vue/1/edit';
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
    ->click('@submit')
    ->assertSee('email field is required');


    $this->browser
    ->clear('@password')
    ->click('@submit')
    ->assertSee('password field is required');


    $this->browser
    ->clear('@name')
    ->click('@submit')
    ->assertSee('name field is required');


    $this->browser
    ->clear('@birth_day')
    ->click('@submit')
    ->assertSee('birth_day field is required');


    $this->browser
    ->clear('@phone')
    ->click('@submit')
    ->assertSee('phone field is required');


    $this->browser
    ->clear('@gender')
    ->click('@submit')
    ->assertSee('gender field is required');



    }



    public function testEdit(){





    $this->browser->visit($this->url());


    $this->browser
    ->clear('@email')
    ->type('@email','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@password')
    ->type('@password','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@name')
    ->type('@name','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@birth_day')
    ->type('@birth_day','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@phone')
    ->type('@phone','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@gender')
    ->type('@gender','9')
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
              
             "@email"=>"[name=email]",
             
             "@password"=>"[name=password]",
             
             "@name"=>"[name=name]",
             
             "@birth_day"=>"[name=birth_day]",
             
             "@phone"=>"[name=phone]",
             
             "@gender"=>"[name=gender]",
                         '@submit'=>'[type=submit]'
             ];
      }
}
