<?php
namespace App\module\translation\test\dusk\page;

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
        return '/admin/translation/create';
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
        ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
    ->clear('@translate_en')
    ->click('@submit')
    ->assertSee('translate_en field is required');



    $this->browser
        ->type('@translate_en','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
    ->clear('@translate_ar')
    ->click('@submit')
    ->assertSee('translate_ar field is required');



    $this->browser
        ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
    ->clear('@translate_before_en')
    ->click('@submit')
    ->assertSee('translate_before_en field is required');



    $this->browser
        ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
    ->clear('@translate_after_en')
    ->click('@submit')
    ->assertSee('translate_after_en field is required');



    $this->browser
        ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
    ->clear('@translate_before_ar')
    ->click('@submit')
    ->assertSee('translate_before_ar field is required');



    $this->browser
        ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
    ->clear('@translate_after_ar')
    ->click('@submit')
    ->assertSee('translate_after_ar field is required');



    $this->browser
        ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@status','9')
    
    ->clear('@user_id')
    ->click('@submit')
    ->assertSee('user_id field is required');



    $this->browser
        ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
    
    ->clear('@status')
    ->click('@submit')
    ->assertSee('status field is required');


    }



    public function testCreate(){




    $this->browser->visit($this->url());

    $this->browser
            ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
    ->click('@submit')
    ->assertSee('added');



    $this->browser->visit($this->url());

    $this->browser
            ->type('@translate_en','9')
            ->type('@translate_ar','9')
            ->type('@translate_before_en','9')
            ->type('@translate_after_en','9')
            ->type('@translate_before_ar','9')
            ->type('@translate_after_ar','9')
            ->type('@user_id','9')
            ->type('@status','9')
    
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

    "@translate_en"=>"[name=translate_en]",

    "@translate_ar"=>"[name=translate_ar]",

    "@translate_before_en"=>"[name=translate_before_en]",

    "@translate_after_en"=>"[name=translate_after_en]",

    "@translate_before_ar"=>"[name=translate_before_ar]",

    "@translate_after_ar"=>"[name=translate_after_ar]",

    "@user_id"=>"[name=user_id]",

    "@status"=>"[name=status]",


            '@submit'=>'[type=submit]'
        ];
    }
}
