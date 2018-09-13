<?php

use Illuminate\Database\Seeder;
use App\Board;

class BoardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Board::create(['id' => 1, 'title' => 'title 1', 'description' => 'description 1']);
        Board::create(['id' => 2, 'title' => 'title 2', 'description' => 'description 2']);  
    }
}
