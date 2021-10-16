<?php

namespace App\DataTables;

use App\Models\Discount;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DiscountDatatable extends DataTable
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
            ->addColumn('action', 'admin.discounts.action')
            ->addColumn('status', 'admin.discounts.status')
            ->rawColumns([
                'action',
                'status',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DiscountDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Discount::query();
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
                'name'=>'discount_code',
                'data'=>'discount_code',
                'title'=>'كود الخصم',
            ],
            [
                'name'=>'percentage',
                'data'=>'percentage',
                'title'=>'قيمه الخصم',
            ],[
                'name'=>'status',
                'data'=> 'status',
                'title'=>'حاله الخصم',
            ],[
                'name'=>'start_at',
                'data'=> 'start_at',
                'title'=>'بدء الخصم فى',
            ],[
                'name'=>'end_at',
                'data'=> 'end_at',
                'title'=>'انتهاء الخصم فى',
            ]
            ,[
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
        return 'Discount_' . date('YmdHis');
    }
}
