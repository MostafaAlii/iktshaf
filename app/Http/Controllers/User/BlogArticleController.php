<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest('id')->paginate(10);
        return view('user.pages.articles.blog-article', compact('articles'));
    }

    public function getSingleArticale($id)
    {
        $articles = Article::with('comments')->where('id', $id)->get();
        return view('user.pages.articles.single-article', compact('articles'));
    }

    public function saveComment(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comments();

        $comment->comment = $request->comment;
        $comment->article_id = $request->article_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return response()->json($comment);
    }

    public function saveReComment(Request $request)
    {
        $request->validate([
            'reComment' => 'required',
        ]);

        $data = Comments::findOrFail($request->comment_id);

        $commentReplay = new Comments();
        $commentReplay->comment = $request->reComment;
        $commentReplay->article_id = $data->article_id;
        $commentReplay->parent = $request->comment_id;
        $commentReplay->user_id = Auth::user()->id;
        $commentReplay->save();

        return response()->json($commentReplay);
    }
}
