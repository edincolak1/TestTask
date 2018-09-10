<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\Services\IssueInterface;
use App\Issue;
use App\User;
use Auth;


class IssueService implements IssueInterface
{
    protected $issue;

    public function __construct(Issue $issue)
    {
        $this->issue = $issue;
    }

    public function index()
    {
        return $this->issue->all();
    }
    
    public function read($id)
    {
        return $this->issue->find($id);
    }

    public function edit(Request $request,$id)
    {
        return $this->issue->find($id);
    }

    public function delete($id)
    {
            
            
        
    }

    public function transfer(Request $request,$id)
    {
        $user_id = Auth::user()->id;
        $issue = Issue::find($id);
    
        if($validate->fails()){
            
            $response=['status' => 'error', 'message'=> 'user_id is mandatory field!'];
        } else if($user_id == $issue->user_id){

            $issue->user_id = $request->user_id;             
            $issue->save();

            $response=['status' => 'success', 'message'=> 'Issue successfuly transfered to another user!'];
        }else{
            $response=['status' => 'faild', 'message'=> 'Can`t transfer issue!'];
        }

        return response($response);
    }

    public function update(array $data, $id)
    {
            
    }
}