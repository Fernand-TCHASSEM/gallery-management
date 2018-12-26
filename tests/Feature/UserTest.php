<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {

        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password',
            'c_password' => 'password'
        ];

        $response = $this->json('POST', '/api/register', $data);

        $response
            ->assertStatus(201)
            ->assertJson([
                'code' => 201
            ]);

        return $data;
    }

    /**
     * @depends testCreate
     */
    public function testUserLoginsSuccessfully($data)
    {

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        $response = $this->json('POST', '/api/login', $credentials);

        $response
            ->assertStatus(200)
            ->assertJson([
                'code' => 200
            ]);
    }
}
