<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('comments')->insert($this->getData());
    }

    public function getData()
    {
        $data = [];
        $faker = \Faker\Factory::create('ru_RU');

        for($i = 1; $i <= 10; $i++) {
            $data[] = [
                'userName' => $faker->name,
                'comment' => $faker->realText(rand(20, 40)),
            ];
        }
        return $data;
    }
}
