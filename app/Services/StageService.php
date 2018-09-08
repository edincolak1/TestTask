<?php

namespace App\Services;

use App\Stage;
use Illuminate\Http\Request;
use App\Services\TaskInterface;


class StageService implements TaskInterface
{
    protected $stage;

    public function __construct(Stage $stage)
    {
        $this->stage = $stage;
    }

    public function index()
    {
        return $this->stage->all();
    }

    public function read($id)
    {
        return $this->stage->find($id);
    }

    public function update(Request $request, $id)
    {

    }
}