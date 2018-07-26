<?php
namespace App\module\vue\test\dusk\page;

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
        return '/admin/vue/create';
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
        ->type('@password','9')
            ->type('@name','9')
            ->type('@birth_day','9')
            ->type('@phone','9')
            ->type('@gender','9')
    
    ->clear('@email')
    ->click('@submit')
    ->assertSee('email field is required');



    $this->browser
        ->type('@email','9')
            ->type('@name','9')
            ->type('@birth_day','9')
            ->type('@phone','9')
            ->type('@gender','9')
    
    ->clear('@password')
    ->click('@submit')
    ->assertSee('password field is required');



    $this->browser
        ->type('@email','9')
            ->type('@password','9')
            ->type('@birth_day','9')
            ->type('@phone','9')
            ->type('@gender','9')
    
    ->clear('@name')
    ->click('@submit')
    ->assertSee('name field is required');



    $this->browser
        ->type('@email','9')
            ->type('@password','9')
            ->type('@name','9')
            ->type('@phone','9')
            ->type('@gender','9')
    
    ->clear('@birth_day')
    ->click('@submit')
    ->assertSee('birth_day field is required');



    $this->browser
        ->type('@email','9')
            ->type('@password','9')
            ->type('@name','9')
            ->type('@birth_day','9')
            ->type('@gender','9')
    
    ->clear('@phone')
    ->click('@submit')
    ->assertSee('phone field is required');



    $this->browser
        ->type('@email','9')
            ->type('@password','9')
            ->type('@name','9')
            ->type('@birth_day','9')
            ->type('@phone','9')
    
    ->clear('@gender')
    ->click('@submit')
    ->assertSee('gender field is required');


    }



    public function testCreate(){




    $this->browser->visit($this->url());

    $this->browser
            ->type('@email','9')
            ->type('@password','9')
            ->type('@name','9')
            ->type('@birth_day','9')
            ->type('@phone','9')
            ->type('@gender','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@email','9')
            ->type('@password','9')
            ->type('@name','9')
            ->type('@birth_day','9')
            ->type('@phone','9')
            ->type('@gender','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@email','9')
            ->type('@password','9')
            ->type('@name','9')
            ->type('@birth_day','9')
            ->type('@phone','9')
            ->type('@gender','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@email','9')
            ->type('@password','9')
            ->type('@name','9')
            ->type('@birth_day','9')
            ->type('@phone','9')
            ->type('@gender','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@email','9')
            ->type('@password','9')
            ->type('@name','9')
            ->type('@birth_day','9')
            ->type('@phone','9')
            ->type('@gender','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@email','9')
            ->type('@password','9')
            ->type('@name','9')
            ->type('@birth_day','9')
            ->type('@phone','9')
            ->type('@gender','9')
    
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
