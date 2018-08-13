<?php
namespace App\module\project\test\dusk\page;

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
        return '/admin/project/create';
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
        ->type('@name','9')
            ->type('@from_language','9')
            ->type('@to_language','9')
            ->type('@status','9')
    
    ->clear('@user_id')
    ->click('@submit')
    ->assertSee('user_id field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@from_language','9')
            ->type('@to_language','9')
            ->type('@status','9')
    
    ->clear('@name')
    ->click('@submit')
    ->assertSee('name field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@name','9')
            ->type('@to_language','9')
            ->type('@status','9')
    
    ->clear('@from_language')
    ->click('@submit')
    ->assertSee('from_language field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@name','9')
            ->type('@from_language','9')
            ->type('@status','9')
    
    ->clear('@to_language')
    ->click('@submit')
    ->assertSee('to_language field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@name','9')
            ->type('@from_language','9')
            ->type('@to_language','9')
    
    ->clear('@status')
    ->click('@submit')
    ->assertSee('status field is required');


    }



    public function testCreate(){




    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@name','9')
            ->type('@from_language','9')
            ->type('@to_language','9')
            ->type('@status','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@name','9')
            ->type('@from_language','9')
            ->type('@to_language','9')
            ->type('@status','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@name','9')
            ->type('@from_language','9')
            ->type('@to_language','9')
            ->type('@status','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@name','9')
            ->type('@from_language','9')
            ->type('@to_language','9')
            ->type('@status','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@name','9')
            ->type('@from_language','9')
            ->type('@to_language','9')
            ->type('@status','9')
    
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

    "@user_id"=>"[name=user_id]",

    "@name"=>"[name=name]",

    "@from_language"=>"[name=from_language]",

    "@to_language"=>"[name=to_language]",

    "@status"=>"[name=status]",


            '@submit'=>'[type=submit]'
        ];
    }
}
