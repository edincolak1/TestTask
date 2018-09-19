<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\BoardTransformer;
use App\Stage;

class Board extends Model
{
    public $transformer = BoardTransformer::class;

    protected $fillable = ['title','description'];
  

    public function stage()
    {
        return $this->hasMany(Stage::class);
    }
}
