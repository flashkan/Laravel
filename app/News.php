<?php


namespace App;

class News
{
    public $id;
    public $title;
    public $description;
    public $group;
    public $private;

    /**
     * Получает данные их файла в json строке, приобразует к obj и возвращает.
     * @return mixed
     */
    private function getContent()
    {
        $urlDbNews = '../resources/db/db_news.json';
        $json = file_get_contents($urlDbNews);
        return json_decode($json);
    }

    /**
     * Подставляет в поле group название группы вместо id
     * @param $news
     * @return mixed
     */
    public function setGroupLabel($news)
    {
        $fromDB = $this->getContent();
        $group = $fromDB->group;
        foreach ($group as $oneGroup) {
            foreach ($news as $oneNews) {
                if ($oneNews->group === $oneGroup->id) {
                    $oneNews->group = $oneGroup->name;
                    continue;
                }
            }
        }
        return $news;
    }

    /**
     * Получение всех новостей
     * @return mixed
     */
    public function getAllNews()
    {
        $fromDB = $this->getContent();
        return $fromDB->news;
    }

    /**
     * Получение одной контретной новости по id
     * @param int $id
     * @return mixed|null
     */
    public function getOneNews(int $id)
    {
        $fromDB = $this->getContent();
        $news = $this->setGroupLabel($fromDB->news);
        foreach ($news as $oneNews) {
            if ($oneNews->id === $id) return $oneNews;
        }
        return null;
    }

    /**
     * Получение всех категорий (групп)
     * @return mixed
     */
    public function getAllCategories()
    {
        $fromDB = $this->getContent();
        return $fromDB->group;
    }

    /**
     * Получение одной конкретной категории (группы) по id
     * @param int $id
     * @return mixed
     */
    public function getOneCategory(int $id)
    {
        $fromDB = $this->getContent();
        $news = [];
        foreach ($fromDB->news as $oneNews) {
            if ($oneNews->group === $id) $news[] = $oneNews;
        }
        return $this->setGroupLabel($news);
    }

    /**
     * Заполняет сущность (модель) News данными из формы для создания новых новостей.
     * @param $request
     * @return int
     */
    public function createNews($request)
    {
        $this->id = (int)$this->createNewId();
        $this->title = $request->input('title');
        $this->description = $request->input('description');
        $this->group = (int)$request->input('group');
        $this->private = (boolean)$request->input('private');
        return $this->id;
    }

    /**
     * Генерирует новый id. Проверяет, что такой id свободен и возвращает его.
     * @return int
     */
    private function createNewId()
    {
        $news = $this->getAllNews();
        $lastId = end($news)->id;
        $newId = $lastId + 1;
        foreach ($news as $one) {
            if ($one->id === $newId) $newId += 1;
        }
        return $newId;
    }

    /**
     * Получает дынные из файла, преобразует из json в obj. Добавляет новую новость. Переводит в json формат
     * и сохраняет в файл.
     */
    public function saveNewsInDb()
    {
        $content = $this->getContent();
        $content->news[] = $this;
        $urlDbNews = '../resources/db/db_news.json';
        file_put_contents($urlDbNews, json_encode($content));
    }
}
