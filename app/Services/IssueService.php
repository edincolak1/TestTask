<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\Services\IssueInterface;
use App\Responses\IssueUpdateRequest;
use App\Exceptions\Handler;
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


    public function delete($id)
    {
<<<<<<< HEAD
            $issue = Issue::find($id);    
            
            $user_id = Auth::user()->id;
                  
            $issue->delete();
            
            $response = [ 'status' => 'failed','message' => 'You can not delete this issue'];
            
            return $response;
=======
            $user_id = Auth::user()->id;
                  
            if($user_id == $issue->user_id){
                $issue = Issue::find($id); 
                $issue->delete();

            }
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34
    }

    public function transfer(Request $request,$id)
    {
        $user_id = Auth::user()->id;
        $issue = Issue::find($id);

        $issue->stage_id = $request->input('stage_id');

        $issue->save();
    }

    public function store(Request $request, $id)
    {
<<<<<<< HEAD
        
=======
            
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34
    }
}