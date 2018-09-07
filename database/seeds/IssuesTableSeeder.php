<?php

use Illuminate\Database\Seeder;
use App\Issues;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Issues::class, 30)->create();
    }
}
