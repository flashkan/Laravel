<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Хранит данные содели Comments
     * @var array
     */
    public $modelComments;

    public function __construct()
    {
        $this->modelComments = new Comments();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comments = $this->modelComments->getAllComments();
        return view('comments', ['comments' => $comments]);
    }

    public function createComment(Request $request)
    {
        $this->validate($request, [
            'userName' => 'required|min:3|max:20',
            'comment' => 'required|min:5|max:225',
        ]);
        $this->modelComments->createComment($request);
        $this->modelComments->saveCommentInDb();
        return $this->index();
    }
}
