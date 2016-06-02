<?php

class TestBase extends TestCase
{

    protected $fake;

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate:refresh');
    }

    public function createUser($attributes = [])
    {
        $user = factory(User::class)->create($attributes);

        return $user;
    }

    public function makeUser($attributes = [])
    {
        $user = factory(User::class)->make($attributes);

        return $user;
    }
}
