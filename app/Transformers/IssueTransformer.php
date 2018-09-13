<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Issue;

class IssueTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Issue $issue)
    {
        return [
            'identifier' => (int)$issue->id,
            'title of the issue' => (string)$issue->title,
            'belongs to user' => (int)$issue->user_id,
            'in stage' => (int)$issue->stage_id,
            'boardCreated' => (string)$issue->created_at,
            'boardLastChange' => (string)$issue->updated_at,         
        ];
    }
}
