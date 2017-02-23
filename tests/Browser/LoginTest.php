<?php
//
//namespace Tests\Browser;
//
//use App\User;
//use Tests\DuskTestCase;
//use Laravel\Dusk\Chrome;
////Use Faker;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
//
//class ExampleTest extends DuskTestCase
//{
//    use DatabaseMigrations;
//
//    /**
//     * A basic browser test example.
//     *
//     * @return void
//     */
//    public function testBasicExample()
//    {
//        //$faker = Faker\Factory::create();
//
//        $user = factory(User::class)->create([
//            'email'         => 'user@town-crier.app',
//            'password'      => bcrypt('secret'),
//            'first_name'    => 'Jackie',
//            'last_name'     => 'Chan',
//        ]);
//
//
//        $this->browse(function ($browser) use ($user) {
//            $browser->visit('/login')
//                ->type('email', $user->email)
//                ->type('password', 'secret')
//                ->press('Login')
//                ->assertPathIs('/');
//        });
//    }
//}