<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stage;
use App\Http\Controllers\ApiController;
use App\Services\StageService;
use App\Services\StageInterface;
<<<<<<< HEAD
use App\Exceptions\ResourceNotFoundException;

=======
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34


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
<<<<<<< HEAD
    }

    public function show($id)
    {
       
       $stage = $this->stageservice->read($id);
 
       if(!$stage){
        throw new ResourceNotFoundException;
       }
        return $this->showOne($stage);
 
=======
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34
    }
}
