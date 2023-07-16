<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        return view ('frontend.index');
    }

    public function add(Request $request)
    {

        if (!Auth::check()) {
            return redirect('login')->with('status', 'Silahkan Login Terlebih Dahulu!');
        }

        $validator = Validator::make($request->all(),[
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'berkas' => 'required|file|mimes:jpg,jpeg,png,doc,pdf|max:5120',
            ],
            [
            'judul.required' => 'Judul Dari Pelaporan Harus Di isi!',
            'judul.string' => 'Judul Harus Berupa String!',
            'deskripsi.required' => 'Deskripsi Harus Di Isi Sesuai Dengan Keterangan!',
            'deskripsi.string' => 'Deskripsi Harus Berupa String!',
            'berkas.required' => 'Berkas Harus di Upload!',
            'berkas.mimes' => 'Pastikan Format File jpeg, jpg, png, pdf, doc!',
            'berkas.max' => 'Ukuran File Maximal 5MB',
            ]);

        if($validator->fails()){
            return back()->with('status', $validator->errors()->first());
        }

        $pengaduan = new Pengaduan();

        if ($request->hasFile('berkas')) {
            $file = $request->file('berkas');
            $filename = Str::random(6).$file->getClientOriginalName();
            $file->move('upload/pengaduan/berkas/',$filename);
            $pengaduan->berkas = $filename;
        }

        $pengaduan->user_id = Auth::id();
        $pengaduan->judul = $request->input('judul');
        $pengaduan->deskripsi = $request->input('deskripsi');
        $pengaduan->save();

        return redirect()->back()->with('status', "Laporan Anda Berhasil diKirim!");
    }
}
