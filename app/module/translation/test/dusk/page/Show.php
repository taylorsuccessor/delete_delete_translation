<?php
namespace App\module\translation\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

use App\module\translation\model\Translation;

class Show extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/translation/1';
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
        $result=Translation::find(1);

    $browser->assertSee($result->translate_en);
    $browser->assertSee($result->translate_ar);
    $browser->assertSee($result->translate_before_en);
    $browser->assertSee($result->translate_after_en);
    $browser->assertSee($result->translate_before_ar);
    $browser->assertSee($result->translate_after_ar);
    $browser->assertSee($result->user_id);
    $browser->assertSee($result->status);


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
