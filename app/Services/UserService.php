<?php

namespace App\Services;

use App\User;
use Illuminate\Http\Request;


class UserService 
{
    protected $user;

    public function __construct(User $user)
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