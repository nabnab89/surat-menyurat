<?php

namespace App\Http\Controllers\Headmaster;

use App\Http\Controllers\Controller;
use App\Models\Incoming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $incoming = Incoming::where([['id_headmaster', '=', $user->headmaster->id], ['status', '=', 0]])->get();
        $incoming->count = count($incoming);
        return view('headmaster.index', compact('user', 'incoming'));
    }
}
