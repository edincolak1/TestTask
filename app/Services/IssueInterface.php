<?php

namespace App\Services;

use Illuminate\Http\Request;

interface IssueInterface
{
    public function index();

    public function read($id);

    public function delete($id);

    public function store(Request $request);

    public function transfer(Request $request,$id);
    

}