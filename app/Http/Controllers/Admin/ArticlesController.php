<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\ArticlesDatatable;
use App\Http\Controllers\Controller;
use Datatables;
use App\Models\Article;
use Storage;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(ArticlesDatatable $article)
    {
       return $article->render('admin.article.index',['title'=>trans('admin.article')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create',['title'=>trans('admin.create_article')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data=$this->validate(request(),[
            'title'=>'required',
            'description'=>'required',
            'content'=>'required',
            'admin_id'=>'required|numeric',
            'tags'=>'sometimes|required',
            'video'=>'sometimes',
            'photo'=>'required|'.v_image(),

        ],[],[
          
        ]);
        if (request()->hasFile('photo')) {
            $data['photo'] = up()->Upload([
                'file'=>'photo',
                'path'=>'article',
                'upload_type'=>'single',
                'delete_file'=>'',
            ]);
        }
        Article::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('article'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

   
   


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $title=trans('admin.edit');
        return view('admin.article.edit',compact('article','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$this->validate(request(),[
            'title'=>'required',
            'description'=>'required',
            'content'=>'required',
            'admin_id'=>'required|numeric',
            'tags'=>'sometimes|required',
            'video'=>'sometimes',
            'photo'=>'sometimes|nullable|'.v_image(),
        ],[],[
           
        ]);
        if (request()->hasFile('photo')) {
            $data['photo'] = up()->Upload([
                'file'=>'photo',
                'path'=>'article',
                'upload_type'=>'single',
                'delete_file'=>Article::find($id)->photo,
            ]);
        }
        Article::where('id',$id)->update($data);
        session()->flash('success',trans('admin.update_added'));
        return redirect(aurl('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $article = Article::find($id);
       Storage::delete($article->photo);
        $article->delete();
        session()->flash('success',trans('admin.delete_record'));
        return redirect(aurl('article'));
    }

   
   

}
