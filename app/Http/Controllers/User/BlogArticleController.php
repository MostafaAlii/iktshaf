<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class BlogArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest('id')->paginate(10);
        return view('user.pages.articles.blog-article', compact('articles'));
    }

    public function getSingleArticale(Request $request, $id){
        Article::find($id)->increment('views');
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

    public function likeArticle(Request $request)
    {
        $article_id = $request->id;
        $user_id = Auth::user()->id;
        $like_user=Like::where('user_id',$user_id)->where('article_id',$article_id)->first();
        if(empty($like_user)){
        $like = new Like();
        $like->article_id = $article_id;
        $like->user_id = $user_id;
        $like->like = '1';
        $like->save();
        }else{
            if($like_user->like==1){
                Like::where('id',$like_user->id)->update(['like'=>'0']);
            }else{
                Like::where('id',$like_user->id)->update(['like'=>'1']);
            }
        }
        $numLike=Like::where('article_id',$article_id)->get()->sum("like");
        $like_us=Like::where('user_id',$user_id)->where('article_id',$article_id)->get()->sum("like");
        return response([
            'status'=>true,
            'numLike'=>$numLike,
            'like_user'=>$like_us,
        ],200);
    }

}
