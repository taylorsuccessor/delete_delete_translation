<?php
namespace App\module\hyperpay\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

use App\module\hyperpay\model\Hyperpay;

class Index extends BasePage
{
    private $browser=null;
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/hyperpay';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
      $result=Hyperpay::where('id','=',1)->first();




        $browser->click('@searchTabButton');

       $browser->type('@user_id',$result->user_id)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->user_id);


        $browser->click('@searchTabButton');

       $browser->type('@amount',$result->amount)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->amount);


        $browser->click('@searchTabButton');

       $browser->type('@checkout_body',$result->checkout_body)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->checkout_body);


        $browser->click('@searchTabButton');

       $browser->type('@checkout_id',$result->checkout_id)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->checkout_id);


        $browser->click('@searchTabButton');

       $browser->type('@note',$result->note)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->note);


        $browser->click('@searchTabButton');

       $browser->type('@response_body',$result->response_body)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->response_body);


        $browser->click('@searchTabButton');

       $browser->type('@response_status',$result->response_status)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->response_status);


        $browser->click('@searchTabButton');

       $browser->type('@return_url',$result->return_url)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->return_url);



    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [

            "@searchTabButton"=>'.right-side-toggle',


    "@user_id"=>"[name=user_id]",

    "@amount"=>"[name=amount]",

    "@checkout_body"=>"[name=checkout_body]",

    "@checkout_id"=>"[name=checkout_id]",

    "@note"=>"[name=note]",

    "@response_body"=>"[name=response_body]",

    "@response_status"=>"[name=response_status]",

    "@return_url"=>"[name=return_url]",
            "@submit"=>"[name=search]",
            "@resultTable"=>'table',

        ];
    }
}
