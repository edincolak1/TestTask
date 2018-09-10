<?php

namespace App\Services;

use Illuminate\Http\Request;

interface IssueInterface
{
    public function index();

    public function read($id);

    public function update(array $data, $id);

    public function transfer(Request $request,$id);

}