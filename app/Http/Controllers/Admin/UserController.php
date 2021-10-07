<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\DataTables\UserDataTable;


class UserController extends Controller
{
    public function index(UserDataTable $dataTable){
        return $dataTable->render('admin.users.index');
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
