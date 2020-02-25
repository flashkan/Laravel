<?php


namespace App;

use Illuminate\Support\Facades\DB;

class NewsGroup
{
    public $id;
    public $name;

    /**
     * Получение всех категорий (групп)
     * @return mixed
     */
    public function getAllGroup()
    {
        return DB::table('news_group')->get();
    }

    /**
     * Получение одной конкретной категории (группы) по id
     * @param int $id
     * @return mixed
     */
    public function getOneGroup(int $id)
    {
        return DB::table('news_group')->find($id);
    }

    /**
     * Получение одной конкретной страницы категории (группы) по id
     * @param int $id
     * @return mixed
     */
    public function getPageOneGroup(int $id)
    {
        return DB::table('news')->join('news_group', 'group', '=', 'news_group.id')
            ->where(["group" => $id])->get();
    }
}
