<?php
namespace App\module\user_notification\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

use App\module\user_notification\model\UserNotification;

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
        return '/admin/user_notification';
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
      $result=UserNotification::where('id','=',1)->first();




        $browser->click('@searchTabButton');

       $browser->type('@user_id',$result->user_id)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->user_id);


        $browser->click('@searchTabButton');

       $browser->type('@title',$result->title)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->title);


        $browser->click('@searchTabButton');

       $browser->type('@body',$result->body)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->body);


        $browser->click('@searchTabButton');

       $browser->type('@url',$result->url)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->url);


        $browser->click('@searchTabButton');

       $browser->type('@is_read',$result->is_read)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->is_read);



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

    "@title"=>"[name=title]",

    "@body"=>"[name=body]",

    "@url"=>"[name=url]",

    "@is_read"=>"[name=is_read]",
            "@submit"=>"[name=search]",
            "@resultTable"=>'table',

        ];
    }
}
