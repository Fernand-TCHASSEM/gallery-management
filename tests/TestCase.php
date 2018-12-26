<?php

namespace Tests;

use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $faker;

    /**
     * Set up the test
     */
    public function setUp()
    {
        parent::setUp();
        \Artisan::call('db:seed');
        
        $this->faker = Faker::create();
    }

}
