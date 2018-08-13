<?php
namespace App\module\upload_file\test\dusk\page;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

use App\module\upload_file\model\UploadFile;

class Show extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/upload_file/1';
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
        $result=UploadFile::find(1);

    $browser->assertSee($result->user_id);
    $browser->assertSee($result->upload_group_id);
    $browser->assertSee($result->name);
    $browser->assertSee($result->original_name);
    $browser->assertSee($result->new_name);
    $browser->assertSee($result->upload_base_url);
    $browser->assertSee($result->detail);


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
