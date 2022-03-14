<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = url('api/superadmin/role/index/get');
        $role = Role::all();
        return view('superadmin.role.index', compact('user', 'data', 'role'));
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Role::all();
            foreach ($data as $value) {
                $value->responsive_id = "";
            }
            return DataTables::of($data)->make(true);
        } else {
            $data = Role::all();
            foreach ($data as $value) {
                $value->responsive_id = "";
            }
            return DataTables::of($data)->make(true);
        }
    }

    public function edit($id, Request $request)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->incoming = $request->incoming == 'on' ? 1 : 0;
        $role->outgoing = $request->outgoing == 'on' ? 1 : 0;
        $role->disposition = $request->disposition == 'on' ? 1 : 0;
        $role->save();

        return redirect()->back();
    }
}
