<?php

namespace App\Services;

use Illuminate\Http\Request;

interface StageInterface
{
    public function index();

    public function read($id);

}