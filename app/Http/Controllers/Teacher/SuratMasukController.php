<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Incoming;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class SuratMasukController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $incoming = Incoming::where([['id_teacher', '=', $user->teacher->id], ['status', '=', 0]])->get();
        $incoming->count = count($incoming);
        $data = url('api/teacher/surat-masuk/index/get', $user->teacher->id);
        $read = url('teacher/surat-masuk/read');
        return view('teacher.surat_masuk.index', compact('user', 'data', 'read', 'incoming'));
    }

    public function getData($id, Request $request)
    {
        if ($request->ajax()) {
            $data = Incoming::where('id_teacher', $id)->get();
            foreach ($data as $value) {
                $value->teacher;
                $value->admin;
                $value->type;
                $value->responsive_id = "";
            }
            return DataTables::of($data)
                ->make(true);
        } else {
            $data = Incoming::where('id_teacher', $id)->get();
            foreach ($data as $value) {
                $value->teacher;
                $value->admin;
                $value->type;
                $value->responsive_id = "";
            }
            return DataTables::of($data)
                ->make(true);
        }
    }

    public function read($id)
    {
        $surat = Incoming::where('id', $id)->first();
        $surat->status = 1;
        $surat->save();
        return redirect()->to($surat->letter);
    }
}
