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
<<<<<<< HEAD
        Issue::create(['id' => 1, 'title' => 'issue 1', 'user_id' => 1, 'stage_id' => 3]);
        Issue::create(['id' => 2, 'title' => 'issue 2', 'user_id' => 1, 'stage_id' => 1]);
        Issue::create(['id' => 3, 'title' => 'issue 3', 'user_id' => 1, 'stage_id' => 1]);
        Issue::create(['id' => 4, 'title' => 'issue 4', 'user_id' => 1, 'stage_id' => 3]);
        Issue::create(['id' => 5, 'title' => 'issue 5', 'user_id' => 1, 'stage_id' => 2]);
        Issue::create(['id' => 6, 'title' => 'issue 6', 'user_id' => 1, 'stage_id' => 1]);
        
=======
        factory(Issue::class, 30)->create();
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34
    }
}
