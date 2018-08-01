<?php
namespace App\module\translation\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

use App\module\translation\model\Translation;

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
        return '/admin/translation';
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
      $result=Translation::where('id','=',1)->first();




        $browser->click('@searchTabButton');

       $browser->type('@translate_en',$result->translate_en)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->translate_en);


        $browser->click('@searchTabButton');

       $browser->type('@translate_ar',$result->translate_ar)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->translate_ar);


        $browser->click('@searchTabButton');

       $browser->type('@translate_before_en',$result->translate_before_en)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->translate_before_en);


        $browser->click('@searchTabButton');

       $browser->type('@translate_after_en',$result->translate_after_en)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->translate_after_en);


        $browser->click('@searchTabButton');

       $browser->type('@translate_before_ar',$result->translate_before_ar)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->translate_before_ar);


        $browser->click('@searchTabButton');

       $browser->type('@translate_after_ar',$result->translate_after_ar)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->translate_after_ar);


        $browser->click('@searchTabButton');

       $browser->type('@user_id',$result->user_id)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->user_id);


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


    "@translate_en"=>"[name=translate_en]",

    "@translate_ar"=>"[name=translate_ar]",

    "@translate_before_en"=>"[name=translate_before_en]",

    "@translate_after_en"=>"[name=translate_after_en]",

    "@translate_before_ar"=>"[name=translate_before_ar]",

    "@translate_after_ar"=>"[name=translate_after_ar]",

    "@user_id"=>"[name=user_id]",

    "@status"=>"[name=status]",
            "@submit"=>"[name=search]",
            "@resultTable"=>'table',

        ];
    }
}
