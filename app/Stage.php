<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\StageTransformer;
use App\Board;
use App\Issue;



class Stage extends Model
{

        public $transformer = StageTransformer::class;

<<<<<<< HEAD
        protected $fillable = ['name','board_id','order', 'completed'];
=======
        protected $fillable = ['name','board_id','order'];
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34


        public function board() {
            return $this->belongsTo(Board::class);
        }

        public function issues() {
            return $this->hasMany(Issue::class);
        }

       
}
