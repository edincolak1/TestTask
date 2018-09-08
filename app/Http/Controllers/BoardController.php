<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Exceptions\ResourceNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\BoardService;
use App\Board;

class BoardController extends ApiController
{
    protected $boardservice;
    
    public function __construct(BoardService $boardservice)
    {
        $this->boardservice = $boardservice;
    }


    public function index()
    {

        $boards = Board::orderBy('id','asc')->with('stage')->get();       
        return $this->showAll($boards);

    }

    public function show($id)
    {
        $board = $this->boardservice->read($id);
 
       if(!$board){
        throw new ResourceNotFoundException;
       }
        return $this->showOne($board);
    }

    
}
