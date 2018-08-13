<?php
namespace App\module\upload_file\test\dusk\page;

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
        return '/admin/upload_file/1/edit';
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
    ->clear('@upload_group_id')
    ->click('@submit')
    ->assertSee('upload_group_id field is required');


    $this->browser
    ->clear('@name')
    ->click('@submit')
    ->assertSee('name field is required');


    $this->browser
    ->clear('@original_name')
    ->click('@submit')
    ->assertSee('original_name field is required');


    $this->browser
    ->clear('@new_name')
    ->click('@submit')
    ->assertSee('new_name field is required');


    $this->browser
    ->clear('@upload_base_url')
    ->click('@submit')
    ->assertSee('upload_base_url field is required');


    $this->browser
    ->clear('@detail')
    ->click('@submit')
    ->assertSee('detail field is required');



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
    ->clear('@upload_group_id')
    ->type('@upload_group_id','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@name')
    ->type('@name','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@original_name')
    ->type('@original_name','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@new_name')
    ->type('@new_name','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@upload_base_url')
    ->type('@upload_base_url','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@detail')
    ->type('@detail','9')
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
             
             "@upload_group_id"=>"[name=upload_group_id]",
             
             "@name"=>"[name=name]",
             
             "@original_name"=>"[name=original_name]",
             
             "@new_name"=>"[name=new_name]",
             
             "@upload_base_url"=>"[name=upload_base_url]",
             
             "@detail"=>"[name=detail]",
                         '@submit'=>'[type=submit]'
             ];
      }
}
