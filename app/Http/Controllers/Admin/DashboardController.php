<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Incoming;
use App\Models\Outgoing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $outgoing = Outgoing::all();
        $count = count($outgoing->where('status', 0));
        return view('admin.index', compact('user', 'count'));
    }
}
