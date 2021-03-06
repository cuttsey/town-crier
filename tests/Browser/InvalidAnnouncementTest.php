<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use App\AnnouncementType;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvalidAnnouncementTest extends DuskTestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Check that correct messaging displayed within modal for a message that fails validation
     * No fields have been completed
     *
     * @group stream
     * @group announcement
     * @group invalid
     * @return void
     */
    public function testCorrectConfirmationMessageStringsDisplayedForAnnouncementMissingAllData()
    {
        $user = User::find(3);

        $this->browse(function ($broadcast) use ($user) {
            $broadcast->loginAs($user)
                ->visit('/shout')
                ->assertSee('Shout!')
                ->press('Shout!')
                ->waitForText('Uh Oh!')
                ->assertSee('Looks like you\'ve forgotten something. Try again')
                ->visit('/stream');
        });
    }

    /**
     * Ensure that an announcement that fails validation does not appear in the stream
     * No fields have been completed
     *
     * @group stream
     * @group announcement
     * @group invalid
     * @return void
     */
    public function testStreamDoesNotContainAnnouncementThatFailedValidationDueToLackOfAnyData()
    {
        $user = User::find(3);

        $this->browse(function ($broadcast) use ($user) {
            $broadcast->loginAs($user)
                ->visit('/shout')
                ->assertSee('Shout!')
                ->press('Shout!')
                ->visit('/stream')
                ->assertDontSeeIn('div.author', $user->fullName());
        });
    }

    /**
     * Check that correct messaging displayed within modal for a message that fails validation
     * Title value has not been entered
     *
     * @group stream
     * @group announcement
     * @group invalid
     * @return void
     */
    public function testCorrectConfirmationMessageStringsDisplayedInModalForAnnouncementMissingTitle()
    {
        $user = User::find(3);

        $this->browse(function ($broadcast) use ($user) {
            $broadcast->loginAs($user)
                ->visit('/shout')
                ->assertSee('Shout!')
                ->type('body', 'Body of the stream item')
                ->select('type_id', (string) AnnouncementType::ANNOUNCEMENT_ID)
                ->press('Shout!')
                ->waitForText('Uh Oh!')
                ->assertSee('Looks like you\'ve forgotten something. Try again');
        });
    }

    /**
     * Ensure that an announcement that fails validation does not appear in the stream
     * Title value has not been entered
     *
     * @group stream
     * @group announcement
     * @group invalid
     * @return void
     */
    public function testStreamDoesNotContainAnnouncementThatFailedValidationDueToLackOfTitle()
    {
        $user = User::find(3);

        $this->browse(function ($broadcast) use ($user) {
            $broadcast->loginAs($user)
                ->visit('/shout')
                ->assertSee('Shout!')
                ->type('body', 'Body of the stream item')
                ->select('type_id', (string) AnnouncementType::ANNOUNCEMENT_ID)
                ->press('Shout!')
                ->visit('/stream')
                ->assertDontSeeIn('div.stream_body', 'Body of the stream item')
                ->assertDontSeeIn('div.author', $user->fullName());
        });
    }

    /**
     * Check that correct messaging displayed within modal for a message that fails validation
     * Body value has not been entered
     *
     * @group stream
     * @group announcement
     * @group invalid
     * @return void
     */
    public function testCorrectConfirmationMessageStringsDisplayedInModalForAnnouncementMissingBody()
    {
        $user = User::find(3);

        $this->browse(function ($broadcast) use ($user) {
            $broadcast->loginAs($user)
                ->visit('/shout')
                ->assertSee('Shout!')
                ->type('title', 'New Stream Item')
                ->select('type_id', (string) AnnouncementType::ANNOUNCEMENT_ID)
                ->press('Shout!')
                ->waitForText('Uh Oh!')
                ->assertSee('Looks like you\'ve forgotten something. Try again')
                ->visit('/stream')
                ->assertDontSeeIn('h4.shout-title', 'New Stream Item')
                ->assertDontSeeIn('div.author', $user->fullName());
        });
    }

    /**
     * Ensure that an announcement that fails validation does not appear in the stream
     * Body value has not been entered
     *
     * @group stream
     * @group announcement
     * @group invalid
     * @return void
     */
    public function testStreamDoesNotContainAnnouncementThatFailedValidationDueToLackOfBody()
    {
        $user = User::find(3);

        $this->browse(function ($broadcast) use ($user) {
            $broadcast->loginAs($user)
                ->visit('/shout')
                ->assertSee('Shout!')
                ->type('title', 'New Stream Item')
                ->select('type_id', (string) AnnouncementType::ANNOUNCEMENT_ID)
                ->press('Shout!')
                ->visit('/stream')
                ->assertDontSeeIn('h4.shout-title', 'New Stream Item')
                ->assertDontSeeIn('div.author', $user->fullName());
        });
    }

    /**
     * Check that correct messaging displayed within modal for a message that fails validation
     * Announcement type has not been selected from the drop down
     *
     * @group stream
     * @group announcement
     * @group invalid
     * @return void
     */
    public function testCorrectConfirmationMessageStringsDisplayedInModalForAnnouncementWithoutSelectedType()
    {
        $user = User::find(3);

        $this->browse(function ($broadcast) use ($user) {
            $broadcast->loginAs($user)
                ->visit('/shout')
                ->assertSee('Shout!')
                ->type('title', 'New Stream Item')
                ->type('body', 'Body of the stream item')
                ->press('Shout!')
                ->waitForText('Uh Oh!')
                ->assertSee('Looks like you\'ve forgotten something. Try again');
        });
    }

    /**
     * Ensure that an announcement that fails validation does not appear in the stream
     * Type value has not been selected
     *
     * @group stream
     * @group announcement
     * @group invalid
     * @return void
     */
    public function testStreamDoesNotContainAnnouncementThatFailedValidationDueToLackOfType()
    {
        $user = User::find(3);

        $this->browse(function ($broadcast) use ($user) {
            $broadcast->loginAs($user)
                ->visit('/shout')
                ->assertSee('Shout!')
                ->type('title', 'New Stream Item')
                ->type('body', 'Body of the stream item')
                ->press('Shout!')
                ->visit('/stream')
                ->assertDontSeeIn('h4.shout-title', 'New Stream Item')
                ->assertDontSeeIn('div.stream_body', 'Body of the stream item')
                ->assertDontSeeIn('div.author', $user->fullName());
        });
    }
}
