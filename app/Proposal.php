<?php


namespace App;

class Proposal
{
    public $id;
    public $userName;
    public $userPhone;
    public $userEmail;
    public $userProposal;

    /**
     * Получает данные их файла в json строке, приобразует к obj и возвращает.
     * @return mixed
     */
    private function getContent()
    {
        $urlDbNews = '../resources/db/db_proposal.json';
        $json = file_get_contents($urlDbNews);
        return json_decode($json);
    }

    /**
     * Получение всех новостей
     * @return mixed
     */
    public function getAllProposal()
    {
        return $this->getContent()->proposal;
    }

    /**
     * Получение одной контретной новости по id
     * @param int $id
     * @return mixed|null
     */
    public function getOneProposal(int $id)
    {
        $proposal = $this->getContent()->proposal;
        foreach ($proposal as $oneProposal) {
            if ($oneProposal->id === $id) return $oneProposal;
        }
        return null;
    }

    /**
     * Заполняет сущность (модель) News данными из формы для создания новых новостей.
     * @param $request
     * @return int
     */
    public function createProposal($request)
    {
        $this->id = (int)$this->createNewId();
        $this->userName = $request->input('userName');
        $this->userPhone = $request->input('userPhone');
        $this->userEmail = $request->input('userEmail');
        $this->userProposal = $request->input('userProposal');
        return $this->id;
    }

    /**
     * Генерирует новый id. Проверяет, что такой id свободен и возвращает его.
     * @return int
     */
    private function createNewId()
    {
        $news = $this->getAllProposal();
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
    public function saveProposalInDb()
    {
        $content = $this->getContent();
        $content->proposal[] = $this;
        $urlDbNews = '../resources/db/db_proposal.json';
        file_put_contents($urlDbNews, json_encode($content));
    }
}
