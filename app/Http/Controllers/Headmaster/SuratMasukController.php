<?php

namespace App\Http\Controllers\Headmaster;

use App\Http\Controllers\Controller;
use App\Models\Incoming;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class SuratMasukController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $incoming = Incoming::where([['id_headmaster', '=', $user->headmaster->id], ['status', '=', 0]])->get();
        $incoming->count = count($incoming);
        $data = url('api/headmaster/surat-masuk/index/get', $user->headmaster->id);
        $read = url('headmaster/surat-masuk/read');
        $teacher = Teacher::all();
        $incomings = Incoming::where('id_headmaster', $user->headmaster->id)->get();
        foreach ($incomings as $value) {
            $date = substr($value->created_at, 0, 10);
            $value->date = Carbon::createFromFormat('Y-m-d', $date)->isoFormat('DD MMMM Y');
            $value->letter_date = Carbon::createFromFormat('Y-m-d', $value->letter_date)->isoFormat('DD MMMM Y');
        }
        return view('headmaster.surat_masuk.index', compact('user', 'data', 'read', 'incoming', 'teacher', 'incomings'));
    }

    public function getData($id, Request $request)
    {
        if ($request->ajax()) {
            $data = Incoming::where('id_headmaster', $id)->get();
            foreach ($data as $value) {
                $date = substr($value->created_at, 0, 10);
                $value->date = Carbon::createFromFormat('Y-m-d', $date)->isoFormat('DD MMMM Y');
                $value->headmaster;
                $value->admin;
                $value->type;
                $value->responsive_id = "";
            }
            return DataTables::of($data)
                ->make(true);
        } else {
            $data = Incoming::where('id_headmaster', $id)->get();
            foreach ($data as $value) {
                $date = substr($value->created_at, 0, 10);
                $value->date = Carbon::createFromFormat('Y-m-d', $date)->isoFormat('DD MMMM Y');
                $value->headmaster;
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
        if ($surat->status == 0) {
            $surat->status = 1;
            $surat->save();
        }
        return redirect()->to($surat->letter);
    }
}
