<?php

use Illuminate\Database\Seeder;

class NewsGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('news_group')->insert($this->getData());
    }

    public function getData()
    {
        return [
            ['name' => 'Sport'],
            ['name' => 'Weather'],
            ['name' => 'Politics'],
            ['name' => 'Art'],
            ['name' => 'Finance'],
        ];
    }
}
