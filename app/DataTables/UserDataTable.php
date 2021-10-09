<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admin.users.action')
            ->addColumn('gender', 'admin.users.gender') 
            ->addColumn('photo', 'admin.users.photo') 
            ->rawColumns([
                'action',
                'gender',
                'photo',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
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
                    'extend'  => 'export',
                    'text'     => "<i class='fa fa-file'></i>" . trans('datetable.export')
                ],
                [
                    'extend'  => 'print',
                    'text'     => "<i class='fa fa-print'></i>" . trans('datetable.print')
                ],
                [
                    'extend'  => 'reset',
                    'text'     => "<i class='fa fa-redo'></i>" . trans('datetable.reset')
                ],
                [
                    'extend'  => 'reload',
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
                'name'=>'name',
                'data'=>'name',
                'title'=>'ألاسم',
            ],[
                'name'=>'email',
                'data'=> 'email',
                'title'=>'البريد الالكترونى',
            ],[
                'name'=>'mobile_num',
                'data'=>'mobile_num',
                'title'=>'رقم الجوال',                            
            ],[             
                'name'=>'gender',
                'data'=> 'gender',
                'title'=>'النوع',
            ],[             
                'name'=>'photo',
                'data'=> 'photo',
                'title'=>'الصورة',
            ],[
                'name'=>'action',
                'data'=>'action',
                'title'=>'الخيارات',            
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
        return 'User_' . date('YmdHis');
    }
}
