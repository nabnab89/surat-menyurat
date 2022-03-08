<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disposition;
use App\Models\Headmaster;
use App\Models\Incoming;
use App\Models\OutgoingType;
use App\Models\Role;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DispositionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = url('api/admin/disposisi/index/get');
        $read = url('admin/disposisi/read');
        $delete = url('admin/disposisi/delete');
        $role = Role::where([['id', '<=', 2]])->get();
        $type = OutgoingType::all();
        $headmaster = Headmaster::all();
        $teacher = Teacher::all();
        return view('admin.disposition.index', compact('user', 'data', 'read', 'role', 'type', 'headmaster', 'teacher', 'delete'));
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Disposition::all()->unique('id_incoming');
            foreach ($data as $value) {
                if ($value->id_teacher != null) {
                    $value->teacher = Teacher::where('id', $value->id_teacher)->first();
                    $dispositions = Disposition::where('id_incoming', $value->id_incoming)->get();
                    $value->teachers = "";
                    foreach ($dispositions as $values) {
                        $name = Teacher::where('id', $values->id_teacher)->first();
                        $value->teachers = $value->teachers . $name->name . ', ';
                    }
                    $value->teachers = substr($value->teachers, 0, -2);
                }
                $value->incoming;
                $value->responsive_id = "";
            }
            return DataTables::of($data)
                ->make(true);
        } else {
            $data = Disposition::all()->unique('id_incoming');
            foreach ($data as $value) {
                if ($value->id_teacher != null) {
                    $value->teacher = Teacher::where('id', $value->id_teacher)->first();
                    $dispositions = Disposition::where('id_incoming', $value->id_incoming)->get();
                    $value->teachers = "";
                    foreach ($dispositions as $values) {
                        $name = Teacher::where('id', $values->id_teacher)->first();
                        $value->teachers = $value->teachers . $name->name . ', ';
                    }
                    $value->teachers = substr($value->teachers, 0, -2);
                }
                $value->incoming;
                $value->responsive_id = "";
            }
            return DataTables::of($data)
                ->make(true);
        }
    }

    public function read($id)
    {
        $surat = Disposition::where('id', $id)->first();
        return redirect()->to($surat->letter);
    }
}
