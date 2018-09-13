<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Exceptions\ResourceNotFoundException;
use Illuminate\Http\Request;
use App\Services\IssueService;
use App\Services\IssueInterface;
use App\Http\Requests\IssueStoreRequest;
use App\Http\Requests\IssueTransferRequest;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use App\Policies;
=======
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34
use App\Responses;
use App\Issue;
use Validator;

class IssueController extends ApiController
{
    protected $issueservice;

    public function __construct(IssueInterface $issueservice)
        {
<<<<<<< HEAD
            $this->issueservice = $issueservice;
=======
        $this->issueservice = $issueservice;
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34
        }


    public function index()
<<<<<<< HEAD
        {   
            $issues = $this->issueservice->index();
            
            return $this->showAll($issues);
=======
        {     
        $issues = $this->issueservice->index();
         
        return $this->showAll($issues);
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34
        }

    

    public function show($id)
        {
<<<<<<< HEAD
            $issue = $this->issueservice->read($id);
   
            if(!$issue){
                throw new ResourceNotFoundException;
            }

            return $this->showOne($issue);
=======
        $issue = $this->issueservice->read($id);
   
       if(!$issue){
        throw new ResourceNotFoundException;
            }

        return $this->showOne($issue);
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34
        }



    public function update(IssueTransferRequest $request, $id)
        {
<<<<<<< HEAD
            
=======
           
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34
            $issue = $this->issueservice->transfer($request, $id);

            $response=['status' => 'success', 'message'=> 'Issue successfuly transfered!'];
            return response($response);
        }
    

    public function destroy($id)
        {
            
<<<<<<< HEAD
            $issue = $this->issueservice->delete($id);

            return response()->json('Issue deleted!');
        }

    public function store(IssueStoreRequest $request) 
        {            
            $user = Auth::user();
 
            if ($user->can('create', Post::class)) {
                return 'Current logged in user is allowed to create new issue.';
            } else {
                return 'Not Authorized';
            }
            
=======
            $issue = $this->issueservice->delete();

            return response()->json('Issue deleted!');
        }

    public function store(IssueStoreRequest $request) 
        {            
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34
            $user_id = Auth::user()->id;
            $issue = new Issue;
            $issue->title = $request->input('title');
            $issue->user_id = $request->input('user_id');
            $issue->stage_id = $request->input('stage_id');

            $issue->save();

            $response=['status' => 'success', 'message'=> 'Issue successfuly stored!'];
           
            return $response;
        }

}
