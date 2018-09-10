<?php

namespace App\Services;

use Illuminate\Http\Request;

interface UserInterface
{
    public function index();

    public function read($id);

}