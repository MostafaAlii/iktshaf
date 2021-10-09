<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Code;
use App\DataTables\CodeDataTable;
class CodeController extends Controller
{
    public function index(CodeDataTable $codeDataTable){
        return $codeDataTable->render('admin.codes.index');
    }
}
