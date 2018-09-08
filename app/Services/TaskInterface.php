<?php

namespace App\Services;

use Illuminate\Http\Request;

interface TaskInterface
{
    public function index();

    public function read($id);

    public function update(Request $request, $id);
}