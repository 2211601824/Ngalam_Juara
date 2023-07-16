<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('backend.index');
    }

    public function users(Request $request)
    {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    public function artikel()
    {
        $artikel = Artikel::all();
        return view('backend.artikel.index', compact('artikel'));
    }

    public function pengaduan()
    {
        $pengaduan = Pengaduan::all();
        return view('backend.pengaduan.index', compact('pengaduan'));
    }
}
