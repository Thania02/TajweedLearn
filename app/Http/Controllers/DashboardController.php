<?php

namespace App\Http\Controllers;

use App\Models\KehadiranOrangTuaModel;
use App\Models\learnTajwidModel;
use App\Models\PencatatanPelanggaranModel;
use App\Models\TargetModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = learnTajwidModel::groupBy('type_learn')->orderBy('created_at', 'asc')->get();
        return view('pages.dashboard.dashboard', [
            'title' => 'Dashboard',
            'data' => $data
        ]);
    }
}
