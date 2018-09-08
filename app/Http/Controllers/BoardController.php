<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Board;

class BoardController extends ApiController
{

    
    public function index()
    {

        $boards = Board::orderBy('id','asc')->with('stage')->get();       
        return $this->showAll($boards);

    }

    public function show($id)
    {
        $board = Board::where('id',$id)->with('stage')->get();
        return $this->showOne($board);
    }
}
