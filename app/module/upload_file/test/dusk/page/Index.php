<?php
namespace App\module\upload_file\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

use App\module\upload_file\model\UploadFile;

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
        return '/admin/upload_file';
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
      $result=UploadFile::where('id','=',1)->first();




        $browser->click('@searchTabButton');

       $browser->type('@user_id',$result->user_id)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->user_id);


        $browser->click('@searchTabButton');

       $browser->type('@upload_group_id',$result->upload_group_id)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->upload_group_id);


        $browser->click('@searchTabButton');

       $browser->type('@name',$result->name)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->name);


        $browser->click('@searchTabButton');

       $browser->type('@original_name',$result->original_name)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->original_name);


        $browser->click('@searchTabButton');

       $browser->type('@new_name',$result->new_name)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->new_name);


        $browser->click('@searchTabButton');

       $browser->type('@upload_base_url',$result->upload_base_url)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->upload_base_url);


        $browser->click('@searchTabButton');

       $browser->type('@detail',$result->detail)
           ->click('@submit')
           ->assertSeeIn('@resultTable',$result->detail);



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

    "@upload_group_id"=>"[name=upload_group_id]",

    "@name"=>"[name=name]",

    "@original_name"=>"[name=original_name]",

    "@new_name"=>"[name=new_name]",

    "@upload_base_url"=>"[name=upload_base_url]",

    "@detail"=>"[name=detail]",
            "@submit"=>"[name=search]",
            "@resultTable"=>'table',

        ];
    }
}
