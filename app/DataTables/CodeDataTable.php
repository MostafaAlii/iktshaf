<?php
namespace App\DataTables;
use App\Models\Code;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
class CodeDataTable extends DataTable
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
            ->addColumn('action', 'admin.codes.action')
            ->addColumn('status', 'admin.codes.status')
            //->addColumn('checkbox', 'admin.codes.checkbox')
            ->rawColumns([
                'action',
                'status',
                //'checkbox',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CodeDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Code::query();
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
                    'className'=> 'btn btn-primary',
                    'text'     => "<i class='fa fa-file'></i>" . trans('datetable.export')
                ],
                [
                    'extend'  => 'print',
                    'className'=> 'btn btn-info',
                    'text'     => "<i class='fa fa-print'></i>" . trans('datetable.print')
                ],
                [
                    'extend'  => 'reset',
                    'className'=> 'btn btn-success',
                    'text'     => "<i class='fa fa-redo'></i>" . trans('datetable.reset')
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
                'name'=>'code',
                'data'=>'code',
                'title'=>'الكود',
            ],[
                'name'=>'status',
                'data'=> 'status',
                'title'=>'حاله الكود',
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
        return 'Code_' . date('YmdHis');
    }
}
