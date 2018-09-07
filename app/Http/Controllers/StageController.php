<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stage;
use App\Http\Controllers\ApiController;

class StageController extends ApiController
{
    public function show(Stage $stage)
    {
        return $this->showOne($stage);
        
    }

    public function index(Stage $stage)
    {
        $boards = $stage->issues()->with('board')->get();
        return $this->showAll($boards);
    }
}
