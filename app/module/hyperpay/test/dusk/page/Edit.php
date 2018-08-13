<?php
namespace App\module\hyperpay\test\dusk\page;

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
        return '/admin/hyperpay/1/edit';
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
    ->clear('@amount')
    ->click('@submit')
    ->assertSee('amount field is required');


    $this->browser
    ->clear('@checkout_body')
    ->click('@submit')
    ->assertSee('checkout_body field is required');


    $this->browser
    ->clear('@checkout_id')
    ->click('@submit')
    ->assertSee('checkout_id field is required');


    $this->browser
    ->clear('@note')
    ->click('@submit')
    ->assertSee('note field is required');


    $this->browser
    ->clear('@response_body')
    ->click('@submit')
    ->assertSee('response_body field is required');


    $this->browser
    ->clear('@response_status')
    ->click('@submit')
    ->assertSee('response_status field is required');


    $this->browser
    ->clear('@return_url')
    ->click('@submit')
    ->assertSee('return_url field is required');



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
    ->clear('@amount')
    ->type('@amount','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@checkout_body')
    ->type('@checkout_body','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@checkout_id')
    ->type('@checkout_id','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@note')
    ->type('@note','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@response_body')
    ->type('@response_body','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@response_status')
    ->type('@response_status','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@return_url')
    ->type('@return_url','9')
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
             
             "@amount"=>"[name=amount]",
             
             "@checkout_body"=>"[name=checkout_body]",
             
             "@checkout_id"=>"[name=checkout_id]",
             
             "@note"=>"[name=note]",
             
             "@response_body"=>"[name=response_body]",
             
             "@response_status"=>"[name=response_status]",
             
             "@return_url"=>"[name=return_url]",
                         '@submit'=>'[type=submit]'
             ];
      }
}
