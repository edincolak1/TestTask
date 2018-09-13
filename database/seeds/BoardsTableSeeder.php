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
        /*DB:table('boards')->delete();

        $boards = array(*/
        Board::create(['id' => 1, 'title' => 'title 1', 'description' => 'description 1']);
        Board::create(['id' => 2, 'title' => 'title 2', 'description' => 'description 2']);
        
        /*);
        
        DB::table('boards')->insert($boards);
        //factory(Board::class, 3)->create();*/
    }
}
