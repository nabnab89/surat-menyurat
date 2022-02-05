<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Incoming;
use App\Models\Outgoing;
use App\Models\OutgoingType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $incoming = Incoming::where([['id_teacher', '=', $user->teacher->id], ['status', '=', 0]])->get();
        $incoming->count = count($incoming);
        $data = url('api/teacher/surat-keluar/index/get', $user->teacher->id);
        $read = url('teacher/surat-keluar/read');
        $delete = url('teacher/surat-keluar/delete');
        $admin = Admin::all();
        $type = OutgoingType::all();
        return view('teacher.surat_keluar.index', compact('user', 'data', 'read', 'delete', 'admin', 'type', 'incoming'));
    }

    public function getData($id, Request $request)
    {
        if ($request->ajax()) {
            $data = Outgoing::where('id_teacher', $id)->get();
            foreach ($data as $value) {
                $value->teacher;
                $value->admin;
                $value->type;
                $value->responsive_id = "";
            }
            return DataTables::of($data)->make(true);
        } else {
            $data = Outgoing::where('id_teacher', $id)->get();
            foreach ($data as $value) {
                $value->teacher;
                $value->admin;
                $value->type;
                $value->responsive_id = "";
            }
            return DataTables::of($data)->make(true);
        }
    }

    public function read($id)
    {
        $surat = Outgoing::where('id', $id)->first();
        return redirect()->to($surat->letter);
    }

    public function delete($id)
    {
        $surat = Outgoing::where('id', $id)->delete();
        return redirect()->back();
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $outgoing =  new Outgoing;
        $outgoing->title = $request->title;
        $outgoing->letter = 'http://127.0.0.1:8000/teacher/dashboard';
        $outgoing->id_type = $request->id_type;
        $outgoing->id_admin = $request->id_admin;
        $outgoing->id_teacher = $user->teacher->id;
        $outgoing->save();
        return redirect()->back();
    }
}
