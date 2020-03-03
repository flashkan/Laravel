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
        $this->call(NewsGroupSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(UserSeeder::class);
    }

    public function runProposal()
    {
        $this->call(ProposalSeeder::class);
    }

    public function runComment()
    {
        $this->call(CommentSeeder::class);
    }
}
