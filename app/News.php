<?php


namespace App;

use Illuminate\Support\Facades\DB;

class News
{
    public $title;
    public $description;
    public $group;
    public $private;

    /**
     * Получение всех новостей
     * @return mixed
     */
    public function getAllNews()
    {
        return DB::table('news')->get();
    }

    /**
     * Получение одной контретной новости по id
     * @param int $id
     * @return mixed|null
     */
    public function getOneNews(int $id)
    {
        return DB::table('news')->find($id);
    }

    /**
     * Заполняет сущность (модель) News данными из формы для создания новых новостей.
     * @param $request
     * @return int
     */
    public function createNews($request)
    {
        $this->title = $request->input('title');
        $this->description = $request->input('description');
        $this->group = (int)$request->input('group');
        $this->private = (boolean)$request->input('private');

        DB::table('news')->insert([
            'title' => $this->title,
            'description' => $this->description,
            'group' => $this->group,
            'private' => $this->private,
        ]);
    }
}
