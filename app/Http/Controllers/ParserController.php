<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function all()
    {
        $xml = XmlParser::load('https://news.yandex.ru/army.rss');
        $data = $xml->parse([
            'news' => [
                'uses' => 'channel.item[title,description]'
            ],
        ]);
        return view('parser.all', ['news' => $data['news']]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $news = new News();
            $news->title = $request->title;
            $news->description = $request->description;
            $news->group = 6;
            $news->save();
            return redirect()->route('news.update', $news);
        };
    }
}
