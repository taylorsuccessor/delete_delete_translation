<?php
namespace App\module\vue\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

use App\module\vue\model\Vue;

class Show extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/vue/1';
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
        $result=Vue::find(1);

    $browser->assertSee($result->email);
    $browser->assertSee($result->password);
    $browser->assertSee($result->name);
    $browser->assertSee($result->birth_day);
    $browser->assertSee($result->phone);
    $browser->assertSee($result->gender);


    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
