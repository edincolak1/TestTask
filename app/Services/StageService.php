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

}