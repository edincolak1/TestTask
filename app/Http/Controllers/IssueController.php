<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Exceptions\ResourceNotFoundException;
use App\Services\IssueService;
use App\Services\IssueInterface;
use App\Http\Requests\IssueStoreRequest;
use App\Http\Requests\IssueUpdateRequest;
use App\Issue;
use Validator;
use Auth;

class IssueController extends ApiController
{
    protected $issueservice;

    public function __construct(IssueInterface $issueservice)
    {
        $this->issueservice = $issueservice;
    }


    public function index()
    {     
        $issues = $this->issueservice->index();
         
        return $this->showAll($issues);
    }

    

    public function show($id)
    {
        $issue = $this->issueservice->read($id);
 
       if(!$issue){
        throw new ResourceNotFoundException;
       }
        return $this->showOne($issue);
    }



    public function transfer($id)
    {
        $issue = $this->issueservice->transfer();

        return response()->json('Issue transfered');
    }
    

    public function destroy(Issue $issue)
        {
            $user_id = Auth::user()->id;
                   
            if($user_id == $issue->user_id){
    
                $issue->delete();
                $response=['status' => 'success', 'message'=> 'Issue successfuly deleted!'];
            }else if($user_id != $issue->user_id){
                
                $response=['status' => 'faild', 'message'=> 'Issue does NOT belong to this user!'];
            }else if($issue == null){
                $response=['status' => 'faild', 'message'=> 'there is no issue with this id'];
            }
    
            return response($response);
        }


    public function update(IssueUpdateRequest $request, $id) 
        {   
            $user_id = Auth::user()->id;
            $issue = Issue::find($id);
            Issue::create($request->all());  

            $response=['status' => 'success', 'message'=> 'Issue successfuly stored!'];
            return $response;
        }

        public function store(IssueStoreRequest $request,$id) 
        {   
            $user_id = Auth::user()->id;
            $issue = Issue::all();
            Issue::create($request->all());  

            $response=['status' => 'success', 'message'=> 'Issue successfuly stored!'];
            return $response;
        }

}
