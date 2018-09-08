<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stage;
use App\Http\Controllers\ApiController;
use App\Services\StageService;



class StageController extends ApiController
{
    
    protected $stageservice;

    public function __construct(StageService $stageservice)
    {
        $this->stageservice = $stageservice;
    }

    public function index()
    {     
        $stage = $this->stageservice->index();
         
        return $this->showAll($stage);
    }
}
