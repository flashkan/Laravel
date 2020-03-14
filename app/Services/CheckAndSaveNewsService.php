<?php


namespace App\Services;

use App\News;
use App\NewsGroup;

class CheckAndSaveNewsService
{
    public function checkAndSave($data)
    {
        $groupId = $this->group($data);
        $this->news($data['news'], $groupId);
    }

    public function group($data)
    {
        $group = $data['group'];
        $groupId = 0;
        $newsGroup = NewsGroup::query()->where('name', '=', $group)->get();
        if (!count($newsGroup)) {
            $newGroup = new NewsGroup;
            $newGroup->fill(['name' => $group]);
            $newGroup->save();
            $groupId = $newGroup->id;
        } else {
            $groupId = $newsGroup->first()->id;
        }
        return $groupId;
    }

    public function news($newNews, $groupId)
    {
        $groupNews = News::query()->where('group', '=', $groupId)->get();
        foreach ($newNews as $news) {
            $news['group'] = $groupId;
            $news['pubDate'] = date('Y-m-d H:i:s', strtotime($news['pubDate']));
            $groupNews->where('title', '=', $news['title']);
            if (!count($groupNews)) {
                $addNews = new News;
                $addNews->fill($news);
                $addNews->save();
            }
        }
    }
}
