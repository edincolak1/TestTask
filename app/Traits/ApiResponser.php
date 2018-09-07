<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
    private function successResponse($data)
    {
        return response()->json($data);
    }

    protected function errorResponse($message)
    {
        return response()->json(['error' => $message]);
    }

    protected function showAll(Collection $collection)
    {
        return $this->successResponse(['data' => $collection]);
    }

    protected function showOne(Model $model)
    {
        return $this->successResponse(['data' => $model]);
    }
}
