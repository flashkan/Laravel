<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    /**
     * Хранит данные содели News
     * @var array
     */
    public $modelNews;

    /**
     * NewsController constructor.
     */
    public function __construct()
    {
        $this->modelNews = new News();
    }

    /**
     * Отоборажает главную страницу новостей. Со всеми новостями.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $news = $this->modelNews->getAllNews();
        return view('news.all', ["news" => $news]);
    }

    /**
     * Получает данные об одной новости и передает в View.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function newsOne($id)
    {
        $news = $this->modelNews->getOneNews($id);
        if (empty($news->id)) return redirect(route('news.all'));
        return view('news.one', ["news" => $news]);
    }

    /**
     * Получает данные об одной группе новостей и передает в View.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($id)
    {
        $news = $this->modelNews->getOneCategory($id);
        return view('news.category', ["news" => $news]);
    }

    /**
     * Страница создания новости.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pageCreate()
    {
        $group = $this->modelNews->getAllCategories();
        $groupMap = [];
        foreach ($group as $one) {
            $groupMap[(int)$one->id] = $one->name;
        }
        return view('news.create', ["group" => $groupMap]);
    }

    /**
     * Принимает post запрос. Валедирует его, создает новость из модели и сохраняет в файл
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createNews(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:30',
            'description' => 'required|min:10|max:255',
            'group' => 'required',
        ]);
        $newIdNews = $this->modelNews->createNews($request);
        $this->modelNews->saveNewsInDb();
        return $this->newsOne($newIdNews);
    }
}
