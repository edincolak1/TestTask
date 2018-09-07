<?php

namespace App\Services;

use App\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserService
{
    public function __construct(UserRepository $user)
    {
        $this->user = $user ;
    }

    public function index()
    {
        return $this->user->all();
    }

    public function read($id)
    {
        return $this->user->find($id);
    }
}