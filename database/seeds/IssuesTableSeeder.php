<?php

use Illuminate\Database\Seeder;
use App\Issue;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Issue::class, 30)->create();
    }
}
