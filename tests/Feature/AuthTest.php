<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testNewUserRegisteredSuccess()
{
    $request = ['email'=>str_random(4).'@maja.ba', 'name'=>str_random(8), 'password'=>'bosnia'];
    $this->json('POST', '/api/register', $request)
        ->assertStatus(200);
}

/**
 * Registration fails request malformed, email requeired
 *
 * @return void
 */
public function testNewUserRegisteredFailsEmailRequired()
{
    $request = [ 'name'=>'Maja', 'password'=>'bosnia'];
    $this->json('POST', '/api/register', $request)
        ->assertStatus(422);
}

/**
 * Login sucsessful
 *
 * @return void
 */
public function testLoginSuccessEmailAndName()
{
    $request = [ 'email'=>'user1@gmail.com', 'name'=>'user1', 'password'=>'secret'];
    $this->json('POST', '/api/login', $request)
        ->assertStatus(200);
}

/**
 * Login sucsessful email only
 *
 * @return void
 */
public function testLoginSuccessEmailOnly()
{
    $request = [ 'email'=>'user1@gmail.com',  'password'=>'secret'];
    $this->json('POST', '/api/login', $request)
        ->assertStatus(200);
}

/**
 * Login sucsessful email only
 *
 * @return void
 */
public function testLoginSuccessNameOnly()
{
    $request = [ 'name'=>'user1',  'password'=>'secret'];
    $this->json('POST', '/api/login', $request)
        ->assertStatus(200);
}
}
