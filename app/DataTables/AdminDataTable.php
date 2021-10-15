<?php

namespace App\DataTables;

use App\Models\Admin;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
class AdminDataTable extends DataTable
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
            ->addColumn('action', 'admin.admins.action')
            ->addColumn('level', 'admin.admins.level') 
            ->addColumn('photo', 'admin.admins.photo') 
            ->rawColumns([
                'action',
                'level',
                'photo',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Admin $model)
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
                'name'=>'name',
                'data'=>'name',
                'title'=>'ألاسم',
            ],[
                'name'=>'email',
                'data'=> 'email',
                'title'=>'البريد الالكترونى',
            ],[             
                'name'=>'level',
                'data'=> 'level',
                'title'=>'مستوى العضوية',
            ],[             
                'name'=>'phone',
                'data'=> 'phone',
                'title'=>'رقم الجوال',
            ],
            [             
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
        return 'Admin_' . date('YmdHis');
    }
}
