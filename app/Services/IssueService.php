<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Exceptions\ResourceNotFoundException;
use App\Services\IssueInterface;
use App\Responses\IssueUpdateRequest;
use App\Responses\IssueStoreRequest;
use App\Exceptions\ForbidenException;
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
        $issue = Issue::find($id);
 
        if (!$issue) {
            throw new ResourceNotFoundException;
        }
        
        return $this->issue->find($id);
    }


    public function delete($id)
    {
        $issue = auth()->user()->issues()->find($id);

        $issue = Issue::find($id);

        if ($user_id = Auth::user()->id) {
            $issue->delete();
        } else {
            return response()->json([
                    'success' => false,
                    'message' => 'Issue with id ' . $id . ' does not belong to this user!'
            ], 400);
        }
    }

    public function transfer(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $issue = Issue::find($id);
        $issue->stage_id = $request->input('stage_id');
        $issue->save();
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        $issue = Issue::all();

        if (!auth()->user()->can('create', $issue)) {
            $user_id = Auth::user()->id;
            $issue = new Issue;
            $issue->title = $request->input('title');
            $issue->user_id = $request->input('user_id');
            $issue->stage_id = $request->input('stage_id');
            $issue->save();
        } else {
            throw new ForbidenException;
        }
    }

    public function update(Request $request, $id)
    {
        $issue = $this->findById($id);
        
        if (isset($data['stage_id'])) {
            $issue->stage_id = $data['stage_id'];
        }

        $issue->save();

        return $this->findById($id);
    }
}
