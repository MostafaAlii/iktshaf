<?php

namespace App\DataTables;

use App\Models\School;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SchoolDataTable extends DataTable
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
            ->addColumn('action', 'admin.keyCodes.school.action')
            ->rawColumns([
                'action',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SchoolDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SchoolDataTable $model)
    {
        return School::query()->with('city')->select('schools.*');

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
            /*[
                'name'=>'checkbox',
                'data'=>'checkbox',
                'title'=>'<input type="checkbox" class="check_all" onclick="check_all()" />',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],*/
            [
                'name'=>'id',
                'data'=>'id',
                'title'=>'#',
            ],[
                'name'=>'name',
                'data'=> 'name',
                'title'=>'إسم المدرسة',
            ],[
                'name'=>'code',
                'data'=>'code',
                'title'=>'كود المدرسة',
            ],
            [
                'name'=>'city.name',
                'data'=>'city.name',
                'title'=>'المدينة',
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
        return 'School_' . date('YmdHis');
    }
}
