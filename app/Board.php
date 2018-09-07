<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stage;

class Board extends User
{
    protected $fillable = ['title','description'];


    

    public function stage() {
        return $this->hasMany(Stage::class);
    }

}
