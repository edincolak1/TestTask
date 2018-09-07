<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Board;
use App\Issues;



class Stage extends Model
{
    protected $fillable = ['name','board_id','order'];

        public function board() {
            return $this->belongsTo(Board::class);
        }

        public function issues() {
            return $this->hasMany(Issues::class);
        }

       
}
