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
        if($collection->isEmpty()){
            return $this->successResponse(['data' => $collection]);
        }

        $transformer = $collection->first()->transformer;

        $collection = $this->transformData($collection, $transformer);

        return $this->successResponse($collection);
    }

    protected function showOne(Model $instance)
    {
        $transformer = $instance->transformer;

        $instance = $this->transformData($instance, $transformer);

        return $this->successResponse($instance);
    }

    protected function transformData($data, $transformer)
    {
        $transformation = fractal($data, new $transformer);

        return $transformation->toArray();
    }
}
