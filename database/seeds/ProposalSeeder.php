<?php

use Illuminate\Database\Seeder;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('proposals')->insert($this->getData());
    }

    public function getData()
    {
        $data = [];
        $faker = \Faker\Factory::create('ru_RU');

        for($i = 1; $i <= 20; $i++) {
            $data[] = [
                'user_id' => $faker->numberBetween(1, 5),
                'userProposal' => $faker->realText(rand(20, 40)),
            ];
        }
        return $data;
    }
}
