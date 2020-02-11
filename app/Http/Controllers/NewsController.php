<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @var array
     */
    public $news = [];

    /**
     * NewsController constructor.
     */
    public function __construct()
    {
        $news = new News();
        $this->news = $news->getFromDB();
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('news', ["news" => $this->news]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category()
    {
        return view('news_category', ["news" => $this->news]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function newsOne($id)
    {
        if (empty($this->news[$id])) return redirect('/news');
        return view('news_one', ["news" => $this->news[$id]]);
    }
}
