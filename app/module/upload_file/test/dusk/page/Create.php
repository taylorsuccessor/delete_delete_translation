<?php
namespace App\module\upload_file\test\dusk\page;

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
        return '/admin/upload_file/create';
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
        ->type('@upload_group_id','9')
            ->type('@name','9')
            ->type('@original_name','9')
            ->type('@new_name','9')
            ->type('@upload_base_url','9')
            ->type('@detail','9')
    
    ->clear('@user_id')
    ->click('@submit')
    ->assertSee('user_id field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@name','9')
            ->type('@original_name','9')
            ->type('@new_name','9')
            ->type('@upload_base_url','9')
            ->type('@detail','9')
    
    ->clear('@upload_group_id')
    ->click('@submit')
    ->assertSee('upload_group_id field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@upload_group_id','9')
            ->type('@original_name','9')
            ->type('@new_name','9')
            ->type('@upload_base_url','9')
            ->type('@detail','9')
    
    ->clear('@name')
    ->click('@submit')
    ->assertSee('name field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@upload_group_id','9')
            ->type('@name','9')
            ->type('@new_name','9')
            ->type('@upload_base_url','9')
            ->type('@detail','9')
    
    ->clear('@original_name')
    ->click('@submit')
    ->assertSee('original_name field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@upload_group_id','9')
            ->type('@name','9')
            ->type('@original_name','9')
            ->type('@upload_base_url','9')
            ->type('@detail','9')
    
    ->clear('@new_name')
    ->click('@submit')
    ->assertSee('new_name field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@upload_group_id','9')
            ->type('@name','9')
            ->type('@original_name','9')
            ->type('@new_name','9')
            ->type('@detail','9')
    
    ->clear('@upload_base_url')
    ->click('@submit')
    ->assertSee('upload_base_url field is required');



    $this->browser
        ->type('@user_id','9')
            ->type('@upload_group_id','9')
            ->type('@name','9')
            ->type('@original_name','9')
            ->type('@new_name','9')
            ->type('@upload_base_url','9')
    
    ->clear('@detail')
    ->click('@submit')
    ->assertSee('detail field is required');


    }



    public function testCreate(){




    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@upload_group_id','9')
            ->type('@name','9')
            ->type('@original_name','9')
            ->type('@new_name','9')
            ->type('@upload_base_url','9')
            ->type('@detail','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@upload_group_id','9')
            ->type('@name','9')
            ->type('@original_name','9')
            ->type('@new_name','9')
            ->type('@upload_base_url','9')
            ->type('@detail','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@upload_group_id','9')
            ->type('@name','9')
            ->type('@original_name','9')
            ->type('@new_name','9')
            ->type('@upload_base_url','9')
            ->type('@detail','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@upload_group_id','9')
            ->type('@name','9')
            ->type('@original_name','9')
            ->type('@new_name','9')
            ->type('@upload_base_url','9')
            ->type('@detail','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@upload_group_id','9')
            ->type('@name','9')
            ->type('@original_name','9')
            ->type('@new_name','9')
            ->type('@upload_base_url','9')
            ->type('@detail','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@upload_group_id','9')
            ->type('@name','9')
            ->type('@original_name','9')
            ->type('@new_name','9')
            ->type('@upload_base_url','9')
            ->type('@detail','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@user_id','9')
            ->type('@upload_group_id','9')
            ->type('@name','9')
            ->type('@original_name','9')
            ->type('@new_name','9')
            ->type('@upload_base_url','9')
            ->type('@detail','9')
    
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
