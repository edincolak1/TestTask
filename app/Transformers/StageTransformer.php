<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Stage;

class StageTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Stage $Stage)
    {
        return [
            'identifier' => (int)$Stage->id,
            'name of the stage' => (string)$Stage->name,
<<<<<<< HEAD
            'order in the stage' => (int)$Stage->order,
            'belongs to board' => (int)$Stage->board_id,
            'completed' => (boolean)$Stage->completed,
=======
            'order of the stage' => (int)$Stage->order,
            'belongs to board' => (int)$Stage->board_id,
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34
            'stageCreated' => (string)$Stage->created_at,
            'stageLastChange' => (string)$Stage->updated_at,         
        ];
    }
}
