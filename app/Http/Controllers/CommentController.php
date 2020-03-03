<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function all()
    {
        return view('comment', ['comment' => Comment::all()]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $comment = new Comment();
            $this->validate($request, Comment::rules());
            $comment->fill($request->all());
            $comment->save();
            return redirect(back()->getTargetUrl() . '#comment-form');
        }
    }
}
