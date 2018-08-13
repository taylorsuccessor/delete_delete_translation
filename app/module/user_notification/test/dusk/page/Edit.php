<?php
namespace App\module\user_notification\test\dusk\page;

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
        return '/admin/user_notification/1/edit';
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
    ->clear('@user_id')
    ->click('@submit')
    ->assertSee('user_id field is required');


    $this->browser
    ->clear('@title')
    ->click('@submit')
    ->assertSee('title field is required');


    $this->browser
    ->clear('@body')
    ->click('@submit')
    ->assertSee('body field is required');


    $this->browser
    ->clear('@url')
    ->click('@submit')
    ->assertSee('url field is required');


    $this->browser
    ->clear('@is_read')
    ->click('@submit')
    ->assertSee('is_read field is required');



    }



    public function testEdit(){





    $this->browser->visit($this->url());


    $this->browser
    ->clear('@user_id')
    ->type('@user_id','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@title')
    ->type('@title','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@body')
    ->type('@body','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@url')
    ->type('@url','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@is_read')
    ->type('@is_read','9')
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
              
             "@user_id"=>"[name=user_id]",
             
             "@title"=>"[name=title]",
             
             "@body"=>"[name=body]",
             
             "@url"=>"[name=url]",
             
             "@is_read"=>"[name=is_read]",
                         '@submit'=>'[type=submit]'
             ];
      }
}
