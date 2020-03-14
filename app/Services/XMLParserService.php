<?php


namespace App\Services;

use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews($link)
    {
        $xml = XmlParser::load($link);
        $data = $xml->parse([
            'group' => [
                'uses' => 'channel.title'
            ],
            'news' => [
                'uses' => 'channel.item[title,description,pubDate]'
            ],
        ]);
        (new CheckAndSaveNewsService)->checkAndSave($data);
    }
}
