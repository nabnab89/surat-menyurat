<?php

namespace App\Http\Controllers\Headmaster;

use App\Http\Controllers\Controller;
use App\Models\Disposition;
use App\Models\Incoming;
use App\Models\Outgoing;
use App\Models\Teacher;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DispositionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $incoming = Incoming::where([['id_headmaster', '=', $user->headmaster->id], ['status', '=', 0]])->get();
        $incoming->count = count($incoming);
        $data = url('api/headmaster/disposisi/index/get', $user->headmaster->id);
        $read = url('headmaster/disposisi/read');
        $acc = url('headmaster/disposisi/acc');
        $not_acc = url('headmaster/disposisi/not_acc');
        $disposition = Disposition::all();
        $teacher = Teacher::all();
        $outgoing = Outgoing::where('status', '>=', 2)->get();
        $outgoing->count = count($outgoing->where('status', 2));
        return view('headmaster.disposisi.index', compact('user', 'data', 'read', 'incoming', 'acc', 'not_acc', 'disposition', 'teacher', 'outgoing'));
    }

    public function getData($id, Request $request)
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

    public function acc($id)
    {
        $surat = Disposition::where('id', $id)->first();
        $surat->status = 1;
        $surat->save();
        $this->readable($surat->id_incoming);
        return redirect()->back();
    }

    public function not_acc($id)
    {
        $surat = Disposition::where('id', $id)->first();
        $surat->status = 2;
        $surat->save();
        $this->readable($surat->id_incoming);
        return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        $now = Carbon::now()->format('dmYHis');
        $filename = $now . '.pdf';
        if (count($request->id_teacher) == 1) {
            foreach ($request->id_teacher as $value) {
                $surat = Disposition::where('id', $id)->first();
                $teacher = Teacher::where('id', $value)->first();
                $name = $teacher->name;
                $surat->incoming->letter_date = Carbon::createFromFormat('Y-m-d', $surat->incoming->letter_date)->isoFormat('DD MMMM Y');
                $date = Carbon::createFromFormat('Y-m-d', substr($surat->incoming->created_at, 0, 10))->isoFormat('DD MMMM Y');
                $pdf = Pdf::loadview('report.disposisi_edit', compact('surat', 'date', 'name', 'request'))->setPaper('a4', 'portrait');
                $pdf->save(public_path('assets/report/disposition/')  . $filename);
                $surat->id_teacher = $value;
                $surat->letter = asset('assets/report/disposition/' . $filename);
                $surat->instruction = $request->instruction;
                $surat->status = 1;
                $surat->save();
                $this->readable($surat->id_incoming);
            }
        } else {
            for ($i = 0; $i < count($request->id_teacher); $i++) {
                if ($i == 0) {
                    $surat = Disposition::where('id', $id)->first();
                    $name = "";
                    foreach ($request->id_teacher as $datas) {
                        $teachers = Teacher::where('id', $datas)->first();
                        $name = $name . $teachers->name . ', ';
                    }
                    $name = substr($name, 0, -2);
                    $surat->incoming->letter_date = Carbon::createFromFormat('Y-m-d', $surat->incoming->letter_date)->isoFormat('DD MMMM Y');
                    $date = Carbon::createFromFormat('Y-m-d', substr($surat->incoming->created_at, 0, 10))->isoFormat('DD MMMM Y');
                    $pdf = Pdf::loadview('report.disposisi_edit', compact('surat', 'date', 'name', 'request'))->setPaper('a4', 'portrait');
                    $pdf->save(public_path('assets/report/disposition/')  . $filename);
                    $surat->id_teacher = $request->id_teacher[$i];
                    $surat->letter = asset('assets/report/disposition/' . $filename);
                    $surat->instruction = $request->instruction;
                    $surat->status = 1;
                    $surat->save();
                    $this->readable($surat->id_incoming);
                } else {
                    $surat_first = Disposition::where('id', $id)->first();
                    $surat = new Disposition;
                    $surat->id_incoming = $surat_first->id_incoming;
                    $surat->id_teacher = $request->id_teacher[$i];
                    $surat->letter = $surat_first->letter;
                    $surat->instruction = $surat_first->instruction;
                    $surat->status = $surat_first->status;
                    $surat->information = $surat_first->information;
                    $surat->save();
                }
            }
        }

        return redirect()->back();
    }

    public function readable($id)
    {
        $incoming = Incoming::where('id', $id)->first();
        if ($incoming->status == 0) {
            $incoming->status = 1;
            $incoming->save();
        }
    }
}
