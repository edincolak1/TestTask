<?php

namespace App\Exceptions;

use Exception;

class ForbidenException extends Exception
{
    public function render()
    {
        return response()->json(['message'=>'Not Authorized !'], 403);
    }
}
