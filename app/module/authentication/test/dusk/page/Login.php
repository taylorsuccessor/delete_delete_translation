<?php

namespace App\module\authentication\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Login extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/login';
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

        $this->assertFailLogin($browser);
        $browser
            ->type('@email','taylorsuccessor@gmail.com')
            ->type('@password','123456')
            ->click('@submit');

        $browser->assertSee('User');

    }


    public function assertFailLogin(&$browser){

        $browser
            ->type('@email','error@gmail.com')
            ->type('@password','123456')
            ->click('@submit');

        $browser->assertSee('do not match');

    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@email' => 'input[name=email]',
            '@password' => 'input[name=password]',
            '@submit'=>'[type="submit"]',
        ];
    }
}
