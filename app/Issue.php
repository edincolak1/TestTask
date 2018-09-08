<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\IssueTransformer;
use App\Issue;
use App\User;


class Issue extends Model
{

    public $transformer = IssueTransformer::class;

    protected $fillable = ['title', 'stage_id', 'user_id'];


    public function stage() {
        return $this->belongsTo(Stage::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
