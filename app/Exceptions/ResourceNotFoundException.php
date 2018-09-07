<?php

namespace App\Exceptions;
 
use Exception;
 
class ResourceNotFoundException extends Exception
{
    public function render()
    {
        return response()->json(['message'=>'User not found'], 404);
    }
}