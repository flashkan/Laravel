<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $news = [];

    public function __construct()
    {
        for ($i = 1; $i <= 20; $i++) {
            $this->news[$i]['id'] = $i;
            $this->news[$i]['title'] = "Some news №{$i}";
            $this->news[$i]['description'] = "Very interesting news $i. Very interesting news $i. Very interesting news $i.";
            if ($i <= 5) $this->news[$i]['group'] = 'Sport';
            elseif ($i <= 10) $this->news[$i]['group'] = 'Weather';
            elseif ($i <= 15) $this->news[$i]['group'] = 'Politics';
            elseif ($i <= 20) $this->news[$i]['group'] = 'Art';
        }
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
