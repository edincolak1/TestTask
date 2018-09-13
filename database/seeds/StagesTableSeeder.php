<?php

use Illuminate\Database\Seeder;
use App\Stage;

class StagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {
                /*DB:table('stages')->delete();
                
                $stages = array(
                        ['id' => 1, 'name' => 'Task 1', 'order' => 1, 'board_id' => 1],
                        ['id' => 2, 'name' => 'Task 2', 'order' => 2, 'board_id' => 1],
                        ['id' => 3, 'name' => 'Task 3', 'order' => 3, 'board_id' => 1],
                );
                
                DB:table('stages')->insert($stages);*/
                //factory(Stage::class, 30)->create();
                Stage::create(['id' => 1, 'name' => 'Task 1', 'order' => 1, 'board_id' => 1, 'completed' => false]);
                Stage::create(['id' => 2, 'name' => 'Task 2', 'order' => 2, 'board_id' => 1, 'completed' => false]);
                Stage::create(['id' => 3, 'name' => 'Task 3', 'order' => 3, 'board_id' => 1, 'completed' => true]);

                Stage::create(['id' => 4, 'name' => 'Task 1', 'order' => 1, 'board_id' => 2, 'completed' => false]);
                Stage::create(['id' => 5, 'name' => 'Task 2', 'order' => 2, 'board_id' => 2, 'completed' => false]);
                Stage::create(['id' => 6, 'name' => 'Task 3', 'order' => 3, 'board_id' => 2, 'completed' => true]);

        }
}
