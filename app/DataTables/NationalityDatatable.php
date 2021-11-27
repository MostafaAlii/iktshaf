<?php
namespace App\DataTables;
use App\Models\Nationality;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
class NationalityDatatable extends DataTable
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
            ->addColumn('action', 'admin.nationalities.action')
            ->rawColumns([
                'action',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\NationalityDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Nationality::query();
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
                'name'=>'nationality_name',
                'data'=>'nationality_name',
                'title'=>'الجنسية',
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
        return 'Nationality_' . date('YmdHis');
    }
}
