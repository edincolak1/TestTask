<?php

use Illuminate\Foundation\Testing\TestCase;


class IssueTest extends TestCase
{
    
    public function testShouldReturnAllIssues(){
        $this->get("issues", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'title',
                    'order',
                    'user_id',
                    'stage_id'
                ]
            ],
            'meta' => [
                '*' => [
                    'total',
                    'count',
                    'per_page',
                    'current_page',
                    'total_pages',
                    'links',
                ]
            ]
        ]);
        
    }

    
    public function testShouldCreateIssue(){
        $parameters = [
            'title' => 'bfgdg',
            'order' => '44',
            'user_id' => '1',
            'stage_id' => '2'
        ];
        $this->post("issues/edit/4", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'title',
                    'order',
                    'user_id',
                    'stage_id'
                ]
            ]    
        );
        
    }
    
    
    public function testShouldDeleteIssue(){
        
        $this->delete("issues/delete/5", [], []);
        $this->seeStatusCode(410);
        $this->seeJsonStructure([
                'status',
                'message'
        ]);
    }
}