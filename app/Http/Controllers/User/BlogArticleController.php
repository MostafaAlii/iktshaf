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

    public function likeArticle($id)
    {
        $article_id = $id;
        $user_id = Auth::user()->id;
        $like = new Like();
        $like->article_id = $article_id;
        $like->user_id = $user_id;
        $like->like = 1;
        $like->save();
        return redirect(route('articlesBlog'));
    }

}
