<?php

namespace App\Http\Controllers;

use App\Jobs\NewsParsing;
use App\Resources;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {
        $rssLinks = Resources::all();
        foreach ($rssLinks as $link) {
            NewsParsing::dispatch($link->link);
        }
        return back();
    }
}
