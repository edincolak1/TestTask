<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stage;
use App\User;


class Issues extends Model
{
    protected $fillable = ['title', 'stage_id', 'user_id'];

    

        public function stage() {
            return $this->belongsTo(Stage::class);
        }

        public function user() {
            return $this->belongsTo(User::class);
        }
}
