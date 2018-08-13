<?php
namespace App\module\hyperpay\test\dusk\page;

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
        return '/admin/hyperpay/create';
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
        ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
    ->clear('@user_id')
    ->click('@submit')
    ->assertSee('user_id field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
    ->clear('@amount')
    ->click('@submit')
    ->assertSee('amount field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
    ->clear('@checkout_body')
    ->click('@submit')
    ->assertSee('checkout_body field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
    ->clear('@checkout_id')
    ->click('@submit')
    ->assertSee('checkout_id field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
    ->clear('@note')
    ->click('@submit')
    ->assertSee('note field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
    ->clear('@response_body')
    ->click('@submit')
    ->assertSee('response_body field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@return_url','9')
    
    ->clear('@response_status')
    ->click('@submit')
    ->assertSee('response_status field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
    
    ->clear('@return_url')
    ->click('@submit')
    ->assertSee('return_url field is required');


    }



    public function testCreate(){




    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@amount','9')
            ->type('@checkout_body','9')
            ->type('@checkout_id','9')
            ->type('@note','9')
            ->type('@response_body','9')
            ->type('@response_status','9')
            ->type('@return_url','9')
    
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
