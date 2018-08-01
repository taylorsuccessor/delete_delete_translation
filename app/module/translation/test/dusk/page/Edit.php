<?php
namespace App\module\translation\test\dusk\page;

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
        return '/admin/translation/1/edit';
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
    ->clear('@translate_en')
    ->click('@submit')
    ->assertSee('translate_en field is required');


    $this->browser
    ->clear('@translate_ar')
    ->click('@submit')
    ->assertSee('translate_ar field is required');


    $this->browser
    ->clear('@translate_before_en')
    ->click('@submit')
    ->assertSee('translate_before_en field is required');


    $this->browser
    ->clear('@translate_after_en')
    ->click('@submit')
    ->assertSee('translate_after_en field is required');


    $this->browser
    ->clear('@translate_before_ar')
    ->click('@submit')
    ->assertSee('translate_before_ar field is required');


    $this->browser
    ->clear('@translate_after_ar')
    ->click('@submit')
    ->assertSee('translate_after_ar field is required');


    $this->browser
    ->clear('@user_id')
    ->click('@submit')
    ->assertSee('user_id field is required');


    $this->browser
    ->clear('@status')
    ->click('@submit')
    ->assertSee('status field is required');



    }



    public function testEdit(){





    $this->browser->visit($this->url());


    $this->browser
    ->clear('@translate_en')
    ->type('@translate_en','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@translate_ar')
    ->type('@translate_ar','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@translate_before_en')
    ->type('@translate_before_en','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@translate_after_en')
    ->type('@translate_after_en','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@translate_before_ar')
    ->type('@translate_before_ar','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@translate_after_ar')
    ->type('@translate_after_ar','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@user_id')
    ->type('@user_id','9')
    ->click('@submit')
    ->assertSee('updated');


    $this->browser->visit($this->url());


    $this->browser
    ->clear('@status')
    ->type('@status','9')
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
