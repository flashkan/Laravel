<?php


namespace App;

class Comments
{
    public $id;
    public $userName;
    public $comment;

    /**
     * Получает данные их файла в json строке, приобразует к obj и возвращает.
     * @return mixed
     */
    private function getContent()
    {
        $urlDbComments = '../resources/db/db_callback_users.json';
        $json = file_get_contents($urlDbComments);
        return json_decode($json);
    }

    /**
     * Получение всех новостей
     * @return mixed
     */
    public function getAllComments()
    {
        return $this->getContent()->comments;
    }

    /**
     * Получение одной контретной новости по id
     * @param int $id
     * @return mixed|null
     */
    public function getOneComment(int $id)
    {
        foreach ($this->getContent() as $oneComment) {
            if ($oneComment->id === $id) return $oneComment;
        }
        return null;
    }

    /**
     * Заполняет сущность (модель) Comments данными из формы для создания новых новостей.
     * @param $request
     * @return int
     */
    public function createComment($request)
    {
        $this->id = (int)$this->createNewId();
        $this->userName = $request->input('userName');
        $this->comment = $request->input('comment');
    }

    /**
     * Генерирует новый id. Проверяет, что такой id свободен и возвращает его.
     * @return int
     */
    private function createNewId()
    {
        $comments = $this->getAllComments();
        $lastId = end($comments)->id;
        $newId = $lastId + 1;
        foreach ($comments as $one) {
            if ($one->id === $newId) $newId += 1;
        }
        return $newId;
    }

    /**
     * Получает дынные из файла, преобразует из json в obj. Добавляет новую новость. Переводит в json формат
     * и сохраняет в файл.
     */
    public function saveCommentInDb()
    {
        $content = $this->getContent();
        $content->comments[] = $this;
        $urlDbComments = '../resources/db/db_callback_users.json';
        file_put_contents($urlDbComments, json_encode($content));
    }
}
