<?php
namespace App\module\user_notification\test\dusk\page;

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
        return '/admin/user_notification/create';
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
        ->type('@title','9')
            ->type('@body','9')
            ->type('@url','9')
            ->type('@is_read','9')
    
    ->clear('@user_id')
    ->click('@submit')
    ->assertSee('user_id field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@body','9')
            ->type('@url','9')
            ->type('@is_read','9')
    
    ->clear('@title')
    ->click('@submit')
    ->assertSee('title field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@title','9')
            ->type('@url','9')
            ->type('@is_read','9')
    
    ->clear('@body')
    ->click('@submit')
    ->assertSee('body field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@title','9')
            ->type('@body','9')
            ->type('@is_read','9')
    
    ->clear('@url')
    ->click('@submit')
    ->assertSee('url field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@title','9')
            ->type('@body','9')
            ->type('@url','9')
    
    ->clear('@is_read')
    ->click('@submit')
    ->assertSee('is_read field is required');


    }



    public function testCreate(){




    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@title','9')
            ->type('@body','9')
            ->type('@url','9')
            ->type('@is_read','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@title','9')
            ->type('@body','9')
            ->type('@url','9')
            ->type('@is_read','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@title','9')
            ->type('@body','9')
            ->type('@url','9')
            ->type('@is_read','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@title','9')
            ->type('@body','9')
            ->type('@url','9')
            ->type('@is_read','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@title','9')
            ->type('@body','9')
            ->type('@url','9')
            ->type('@is_read','9')
    
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

    "@title"=>"[name=title]",

    "@body"=>"[name=body]",

    "@url"=>"[name=url]",

    "@is_read"=>"[name=is_read]",


            '@submit'=>'[type=submit]'
        ];
    }
}
