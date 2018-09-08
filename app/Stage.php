<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\StageTransformer;
use App\Board;
use App\Issue;



class Stage extends Model
{

    public $transformer = StageTransformer::class;

    protected $fillable = ['name','board_id','order'];

        public function board() {
            return $this->belongsTo(Board::class);
        }

        public function issues() {
            return $this->hasMany(Issue::class);
        }

       
}
