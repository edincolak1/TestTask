<?php

namespace App\Services;

use App\Stage;
use Illuminate\Http\Request;
use App\Services\StageInterface;


class StageService implements StageInterface
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

<<<<<<< HEAD
    public function read($id)
    {
        return $this->stage->find($id);
    }

=======
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34
}