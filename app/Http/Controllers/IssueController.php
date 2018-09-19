<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Exceptions\ResourceNotFoundException;
use App\Http\Responses;
use Illuminate\Http\Request;
use App\Services\IssueService;
use App\Services\IssueInterface;
use App\Http\Requests\IssueStoreRequest;
use App\Http\Requests\IssueTransferRequest;
use Illuminate\Support\Facades\Auth;
use App\Policies;
use App\Issue;
use Validator;

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
   
        if (!$issue) {
            throw new ResourceNotFoundException;
        }
        return $this->showOne($issue);
    }


    public function update(IssueTransferRequest $request, $id)
    {
        $issue = $this->issueservice->transfer($request, $id);
        $response=['status' => 'success', 'message'=> 'Issue successfuly transfered!'];
        return response($response);
    }
    

    public function destroy($id)
    {
        $issue = $this->issueservice->delete($id);
        return response()->json('Issue deleted!');
    }


    public function store(IssueStoreRequest $request)
    {
        $issue = $this->issueservice->store($request);
        $response=['status' => 'success', 'message'=> 'Issue successfuly stored!'];
        return response($response);
    }
}
