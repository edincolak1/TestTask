<?php

namespace App\Services;

use Illuminate\Http\Request;

interface BoardInterface
{
    public function index();

    public function read($id);

}