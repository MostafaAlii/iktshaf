<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ArticlesDatatable;
use App\Http\Controllers\Controller;
use Datatables;
use App\Models\Article;
use Storage;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
//use Illuminate\Http\Request;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(ArticlesDatatable $article)
    {
       return $article->render('admin.article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request) {
        $title=$request->title;
        $description=$request->description;
        $content=$request->content;
        $admin_id=$request->admin_id;
        $tags=$request->tags;
        $department_id=$request->department_id;
        $article =new Article();
        $article->title = $title;
        $article->description = $description;
        $article->content = $content;
        $article->admin_id = $admin_id;
        $article->department_id = $department_id;
        $article->tags =  $tags;
        if (request()->hasFile('photo') && request('photo') != '') {
            $image=$request->file('photo');
            $imageName=time(). '.' .$image->extension();
            $image->move(public_path('storage/article'),$imageName);
        $article->photo = 'article/'.$imageName;
        }
        $article->save();      
        session()->flash('success','تم أضافة المقال بنجاح');
        return redirect(aurl('article'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $article = Article::find($id);
        return view('admin.article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $id) {
        $title=$request->title;
        $description=$request->description;
        $content=$request->content;
        $admin_id=$request->admin_id;
        $tags=$request->tags;
        $department_id=$request->department_id;
        $article = Article::find($id);        
        $article->title = $title;
        $article->description = $description;
        $article->content = $content;
        $article->admin_id = $admin_id;
        $article->department_id = $department_id;
        $article->tags =  $tags;
        if (request()->hasFile('photo') && request('photo') != '') {
            $imagePath = public_path('storage/'.$article->photo);          
            $image=$request->file('photo');
            $imageName=time(). '.' .$image->extension();
            $image->move(public_path('storage/article'),$imageName);
            $article->photo = 'article/'.$imageName;
            }else{
            unset($photo);            
            }       
        $article->save();      
        session()->flash('success','تم تحديث بيانات المقال بنجاح');
        return redirect(aurl('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
       $article = Article::find($id);
       Storage::delete($article->photo);
        $article->delete();
        session()->flash('success','تم حذف المقال بنجاح');
        return redirect(aurl('article'));
    }
}
