<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stage;
use App\Http\Controllers\ApiController;
use App\Services\StageService;
use App\Services\StageInterface;
use App\Exceptions\ResourceNotFoundException;



class StageController extends ApiController
{
    
    protected $stageservice;

    public function __construct(StageInterface $stageservice)
    {
        $this->stageservice = $stageservice;
    }

    public function index()
    {     
        $stage = $this->stageservice->index();
         
        return $this->showAll($stage);
    }

    public function show($id)
    {
       
       $stage = $this->stageservice->read($id);
 
       if(!$stage){
        throw new ResourceNotFoundException;
       }
        return $this->showOne($stage);
 
    }
}
