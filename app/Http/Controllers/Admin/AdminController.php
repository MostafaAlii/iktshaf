<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminDataTable;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index(AdminDataTable $dataTable)
    {
        return $dataTable->render('admin.admins.index');
    }

    public function signUpMarketer(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->level = 2;
        $admin->status = '0';
        $admin->save();

        return redirect('/');
    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function delete($id)
    {

    }

}
