<?php

namespace App\Services;

use App\Issues;
use App\Repositories\IssueRepository;
use Illuminate\Http\Request;

class IssueService
{
    public function __construct(IssueRepository $issues)
    {
        $this->issues = $issues ;
    }

    public function index()
    {
        return $this->issues->all();
    }

    public function read($id)
    {
        return $this->issues->find($id);
    }
}