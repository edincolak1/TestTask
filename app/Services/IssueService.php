<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\Issues;


class IssueService 
{
    protected $user;

    public function __construct(Issues $issues)
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