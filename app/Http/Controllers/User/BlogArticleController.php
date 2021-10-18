<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Admin;
class BlogArticleController extends Controller
{
    public function index(){
        $articles = Article::latest('id')->paginate(10);
        return view('user.pages.articles.blog-article', compact('articles'));
    }

    public function getSingleArticale(Article $article){
        return view('user.pages.articles.single-article', compact('article'));
    }
}
