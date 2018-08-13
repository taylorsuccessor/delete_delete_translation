<?php
namespace App\module\hyperpay\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

use App\module\hyperpay\model\Hyperpay;

class Show extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/hyperpay/1';
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
        $result=Hyperpay::find(1);

    $browser->assertSee($result->user_id);
    $browser->assertSee($result->amount);
    $browser->assertSee($result->checkout_body);
    $browser->assertSee($result->checkout_id);
    $browser->assertSee($result->note);
    $browser->assertSee($result->response_body);
    $browser->assertSee($result->response_status);
    $browser->assertSee($result->return_url);


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
