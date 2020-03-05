<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert($this->getData());
    }

    public function getData()
    {
        return [
            'name' => 'name',
            'email' => 'email@email',
            'password' => \Illuminate\Support\Facades\Hash::make(123123123),
        ];
    }
}
