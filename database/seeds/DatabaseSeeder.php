<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(NewsGroupSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(ProposalSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
