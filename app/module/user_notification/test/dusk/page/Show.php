<?php
namespace App\module\user_notification\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

use App\module\user_notification\model\UserNotification;

class Show extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/user_notification/1';
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
        $result=UserNotification::find(1);

    $browser->assertSee($result->user_id);
    $browser->assertSee($result->title);
    $browser->assertSee($result->body);
    $browser->assertSee($result->url);
    $browser->assertSee($result->is_read);


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
