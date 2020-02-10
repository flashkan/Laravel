<?php


namespace App;


class News
{
    /**
     * @return array
     */
    public function getFromDB()
    {
        $news = [];
        for ($i = 1; $i <= 20; $i++) {
            $news[$i]['id'] = $i;
            $news[$i]['title'] = "Some news №{$i}";
            $news[$i]['description'] = "Very interesting news $i. Very interesting news $i. Very interesting news $i.";
            if ($i <= 5) $news[$i]['group'] = 'Sport';
            elseif ($i <= 10) $news[$i]['group'] = 'Weather';
            elseif ($i <= 15) $news[$i]['group'] = 'Politics';
            elseif ($i <= 20) $news[$i]['group'] = 'Art';
        }
        return $news;
    }
}
