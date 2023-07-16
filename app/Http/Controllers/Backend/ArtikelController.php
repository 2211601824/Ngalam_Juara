<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function add()
    {
        return view('backend.artikel.add');
    }

    public function insert(Request $request)
    {
        $artikel = new Artikel();

        if($request->hasFile('file')){
            $fileName=$request->file('file')->getClientOriginalName();
            $path=$request->file('file')->storeAs('content', $fileName, 'public');
            return response()->json(['location'=>"/storage/$path"]);
        }

        /*$imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);*/

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = $file->getClientOriginalName();
            $file->move('upload/artikel/cover/',$filename);
            $artikel->cover = $filename;
        }

        $artikel->kategori = $request->input('kategori');
        $artikel->title = $request->input('title');
        $artikel->slug = Str::slug($request->input('title')).'-'.Str::random(3);
        $artikel->content = $request->input('content');
        $artikel->status = $request->input('status');
        $artikel->save();

        return redirect('dashboard/artikel')->with('status', "Artikel Berhasil diTambahkan!");
    }

    public function delete($id)
    {
        $artikel = Artikel::find($id);
        $artikel->delete();

        return redirect('dashboard/artikel')->with('status', "Artikel Berhasil diHapus!");
    }
}
