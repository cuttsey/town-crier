<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test a user can login and receive the correct welcome message.
     *
     * @group passing
     * @return void
     */
    public function testSuccessfulLoginReceivesCorrectWelcomeMessage()
    {
        $user = factory(User::class)->create([
            'email'         => 'jackie.chan@town-crier.app',
            'first_name'    => 'Jackie',
            'last_name'     => 'Chan',
            'password'      => bcrypt('secret')
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/')
                ->assertSee('Welcome back, '.$user->first_name);
        });
    }
}
