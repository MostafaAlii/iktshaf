<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\DataTables\AdminDataTable;


class AdminController extends Controller
{
    public function index(AdminDataTable $dataTable){
        return $dataTable->render('admin.admins.index');
    }
    public function add(){
       
    }
    public function store(Request $request){
      
      
    }
 
    public function edit($id){
       
    }
    public function update(Request $request){
       
    }
    public function delete($id){
       
    }
  
}
