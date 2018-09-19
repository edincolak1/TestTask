<?php

namespace Tests\Feature\Api;

use App\Issue;
use App\Board;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserFeatureTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function testBoard()
    {
        $data = [
            'title' => "New",
            'description' => "This is a board"
        ];
        $user = factory(\App\Board::class)->create();
        $response = $this->actingAs($board, 'api')->json('GET', '/api/board/'.$issue->id, $data);
        $response->assertStatus(200);
        $response->assertJson(['status' => true]);
        $response->assertJson(['message' => "Board Created!"]);
        $response->assertJson(['data' => $data]);
    }

    public function testAllBoards()
    {
        $response = $this->json('GET', '/api/boards');
        $response->assertStatus(200);

        $response->assertJsonStructure(
                [
                    [
                            'title',
                            'description'
                    ]
                ]
            );
    }

    public function testAllIssues()
    {
        $this->issue('issues', ['title' => 'awesome issue'], ['HTTP_Authorization' => 'Bearer' . $token]);
        $response = $this->json('GET', '/api/auth/issues');
        $response->assertStatus(200);

        $response->assertJsonStructure(
                [
                    [
                        'title',
                        'stage_id',
                        'user_id'
                    ]
                ]
            );
    }
    public function testDeleteIssue()
    {
        $response = $this->json('GET', '/api/auth/issue');
        $response->assertStatus(200);

        $issue = $response->getData(
                [
                    [
                    'title',
                    'stage_id',
                    'user_id'
                    ]
                ]
            );

        $issue = factory(\App\Issue::class)->create();
        $delete = $this->actingAs($issue, 'api')->json('GET', '/api/auth/issues/delete'.$issue->id);
        $delete->assertStatus(200);
        $delete->assertJson(['message' => "Issue Deleted!"]);
    }

    public function testUpdateIssue()
    {
        $issue = factory(\App\Issue::class)->create();
        $response = $this->actingAs($issue, 'api')->json('POST', '/api/auth/issues/edit'.$issue->id);
        $response->assertStatus(200);

        $issue = $response->getData(
                [
                    [
                    'title',
                    'stage_id',
                    'user_id'
                    ]
                ]
            );

        $update = $this->actingAs($issue, 'api')->json('POST', '/api/auth/issues/edit/'.$issue->id);
        $update->assertStatus(200);
        $update->assertJson(['message' => "Issue Updated!"]);
    }
}
