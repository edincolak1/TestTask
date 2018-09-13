<?php

namespace App\Exceptions;
 
use Exception;
 
class ResourceNotFoundException extends Exception
{
    public function render()
    {
        return response()->json(['message'=>'Not found!'], 404);
    }
}