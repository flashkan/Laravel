<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsGroup;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    /**
     * Отоборажает главную страницу новостей. Со всеми новостями.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all()
    {
        return view('news.all', ["news" => News::all()]);
    }

    /**
     * Получает данные об одной новости и передает в View.
     * @param News $news
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function one(News $news)
    {
        session(['private' => $news->private]);
        return view('news.one', ["news" => $news]);
    }

    public function add(Request $request)
    {
        $news = new News();
        if ($request->isMethod('post')) {
            $this->validate($request, News::rules());
            $news->fill($request->all());
            $news->save();
            return redirect()
                ->route('news.one', ['news' => $news])
                ->with('success', 'News successfully created');
        }
        return view('news.add', [
            'news' => $news,
            'group' => (new NewsGroup())->mapGroup(),
            'route' => 'news.add'
        ]);
    }

    public function update(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            $news->fill($request->all());
            $news->save();
            return redirect()
                ->route('news.one', ['news' => $news])
                ->with('success', 'News successfully updated');
        }
        return view('news.add', [
            'news' => $news,
            'group' => (new NewsGroup())->mapGroup(),
            'route' => 'news.update'
        ]);
    }

    public function delete(News $news)
    {
        $news->delete();
        return redirect()
            ->route('news.all', ['news' => $news])
            ->with('success', 'News successfully deleted');
    }

    public function group($groupId)
    {
        $newsGroupOne = News::query()
            ->where('group', '=', $groupId)
            ->get();
        $group = NewsGroup::query()
            ->find($groupId);
        return view('news.category', ['news' => $newsGroupOne, 'group' => $group]);
    }
}
