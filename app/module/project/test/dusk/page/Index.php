<?php
namespace App\module\project\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

use App\module\project\model\Project;

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
        return '/admin/project';
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
      $result=Project::where('id','=',1)->first();




        $browser->click('@searchTabButton');

       $browser->type('@user_id',$result->user_id)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->user_id);


        $browser->click('@searchTabButton');

       $browser->type('@name',$result->name)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->name);


        $browser->click('@searchTabButton');

       $browser->type('@from_language',$result->from_language)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->from_language);


        $browser->click('@searchTabButton');

       $browser->type('@to_language',$result->to_language)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->to_language);


        $browser->click('@searchTabButton');

       $browser->type('@status',$result->status)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->status);



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

    "@name"=>"[name=name]",

    "@from_language"=>"[name=from_language]",

    "@to_language"=>"[name=to_language]",

    "@status"=>"[name=status]",
            "@submit"=>"[name=search]",
            "@resultTable"=>'table',

        ];
    }
}
