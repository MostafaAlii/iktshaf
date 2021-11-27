<?php

namespace App\DataTables;

use App\Models\Article;
use Yajra\DataTables\Services\DataTable;
use App\Http\Controllers\UsersController;

class ArticlesDatatable  extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->addColumn('action', 'admin.article.action')
        //->addColumn('checkbox', 'admin.article.checkbox')
        ->addColumn('photo', 'admin.article.photo') 
        ->rawColumns([
            'action',
            'photo',
            //'checkbox',
        ]);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Article::query()->with('admin_id')->select('articles.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->orderBy(1)
        ->parameters([
            'dom'          => 'Bfrtip',
            'buttons'      => [
                [
                    'extend'  => 'csv',
                    'className'=> 'btn btn-primary',
                    'text'     => "<i class='fa fa-file'></i>" . trans('datetable.ex_csv')
                ],
                [
                    'extend'  => 'excel',
                    'className'=> 'btn btn-success',
                    'text'     => "<i class='fa fa-file'></i>". trans('datetable.ex_excel')
                ],
                [
                    'extend'  => 'print',
                    'className'=> 'btn btn-info',
                    'text'     => "<i class='fa fa-print'></i>" . trans('datetable.print')
                ],
                [
                    'extend'  => 'reload',
                    'className'=> 'btn btn-dark',
                    'text'     => "<i class='fa fa-sync-alt'></i>" . trans('datetable.reload')
                ],
            
           
            ],
            
            'language' => datatable_lang(),
        ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
           [
                'name'=>'id',
                'data'=>'id',
                'title'=>'#',
            ],[
                'name'=>'title',
                'data'=>'title',
                'title'=>'العنوان',
            ],[
                'name'=>'admin_id.name',
                'data'=>'admin_id.name',
                'title'=>'بواسطة',
            ],[
                'name'=>'photo',
                'data'=>'photo',
                'title'=>'الصورة',
            ],[
                'name'=>'action',
                'data'=>'action',
                'title'=>'الخيارات',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ] 
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'admin.article.index' . date('YmdHis');
    }

    public function anyData()
    {
        return Datatables::of(Article::query())->make(true);
    }


}
