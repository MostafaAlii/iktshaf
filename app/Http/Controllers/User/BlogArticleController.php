<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Admin;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class BlogArticleController extends Controller
{
    public function index(){
        $articles = Article::latest('id')->paginate(10);
        return view('user.pages.articles.blog-article', compact('articles'));
    }

    public function getSingleArticale(Request $request, $id){
        Article::find($id)->increment('views');
        $article = Article::find($id);
        return view('user.pages.articles.single-article', compact('article'));
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
