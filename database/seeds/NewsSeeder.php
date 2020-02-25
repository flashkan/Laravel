<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('news')->insert($this->getData());
    }

    public function getData()
    {
        $data = [];
        $faker = \Faker\Factory::create('ru_RU');

        for($i = 1; $i <= 20; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10, 15)),
                'description' => $faker->realText(rand(30, 100)),
                'group' => $faker->numberBetween(1, 5),
                'private' => $faker->boolean(50),
            ];
        }
        return $data;
    }
}
