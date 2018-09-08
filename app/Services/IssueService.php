<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\Services\TaskInterface;
use App\Issue;


class IssueService implements TaskInterface
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

    public function update(Request $request, $id)
    {

    }
}