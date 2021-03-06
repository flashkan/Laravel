<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $comment = new Comment();
            $this->validate($request, $comment->rules());
            $comment->fill(array_merge($request->all(), ['user_id' => Auth::id()]));
            $comment->save();
            return redirect(back()->getTargetUrl() . '#comment-form');
        }
    }
}
