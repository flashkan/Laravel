<?php

use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('resources')->insert($this->getData());
    }

    private function getData()
    {
        return [
            ['link' => 'https://news.yandex.ru/auto.rss'],
            ['link' => 'https://news.yandex.ru/auto_racing.rss'],
            ['link' => 'https://news.yandex.ru/army.rss'],
            ['link' => 'https://news.yandex.ru/gadgets.rss'],
            ['link' => 'https://news.yandex.ru/index.rss'],
            ['link' => 'https://news.yandex.ru/martial_arts.rss'],
            ['link' => 'https://news.yandex.ru/communal.rss'],
            ['link' => 'https://news.yandex.ru/health.rss'],
            ['link' => 'https://news.yandex.ru/games.rss'],
            ['link' => 'https://news.yandex.ru/internet.rss'],
            ['link' => 'https://news.yandex.ru/cyber_sport.rss'],
            ['link' => 'https://news.yandex.ru/movies.rss'],
            ['link' => 'https://news.yandex.ru/cosmos.rss'],
            ['link' => 'https://news.yandex.ru/culture.rss'],
            ['link' => 'https://news.yandex.ru/fire.rss'],
            ['link' => 'https://news.yandex.ru/championsleague.rss'],
            ['link' => 'https://news.yandex.ru/music.rss'],
            ['link' => 'https://news.yandex.ru/nhl.rss'],
        ];
    }
}
