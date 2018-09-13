<?php

namespace App\Services;

use App\Board;
use Illuminate\Http\Request;
use App\Services\BoardInterface;


class BoardService implements BoardInterface
{
    protected $board;

    public function __construct(Board $board)
    {
        $this->board = $board;
    }

    public function index()
    {
        return $this->board->all();
    }

    public function read($id)
    {
        return $this->board->find($id);
    }

}