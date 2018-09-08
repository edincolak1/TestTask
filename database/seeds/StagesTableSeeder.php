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
                factory(Stage::class, 3)->create();
        }
}
