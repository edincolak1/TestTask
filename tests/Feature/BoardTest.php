<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Board;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BoardTest extends TestCase
{
    use RefreshDatabase;

    private $user;


    /**
     * get JWT token
     */
    public function setUp()
    {
        parent::setUp();

        $this->seed('UsersTableSeeder');
        $this->seed('BoardsTableSeeder');

        $this->user = User::findOrFail(1);

        // get boards
        $this->allBoard = Board::all();
    }

    /**
     * Request with missing information fails
     *
     * @return void
     */
    public function testGetAllBoards()
    {
        $this->json('GET', '/api/auth/boards', [],  [
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC90ZXN0MS50ZXN0XC9hcGlcL2xvZ2luIiwiaWF0IjoxNTM1NjIyNzA5LCJleHAiOjE1MzU2MjYzMDksIm5iZiI6MTUzNTYyMjcwOSwianRpIjoiaVBLS2FVbkRFeXBsbXdrbSIsInN1YiI6MSwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.1xqupIHP8vQLf2kP6VRCXtFkMpIWCxAJAmLsMqMkcDY'
        ])
            ->assertSee('"id":"'.$this->allBoard->first()->id . '"')
            ->assertStatus(200);
    }

}


