<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Board;

class BoardTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Board $board)
    {
        return [
            'identifier' => (int)$board->id,
            'title of the board' => (string)$board->title,
            'description of the board' => (string)$board->description,
            'boardCreated' => (string)$board->created_at,
            'boardLastChange' => (string)$board->updated_at,         
        ];
    }
}
