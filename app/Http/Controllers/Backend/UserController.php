<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(),[
        'nik' => 'required|string',
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'phone' => 'required|string',
        'password' => 'required',
        ], [
            'nik.required' => 'NIK tidak boleh kosong!',
            'nik.string' => 'NIK Harus Berupa String',
            'name.required' => 'Nama tidak boleh kosong!',
            'name.string' => 'Nama Harus Berupa String',
            'name.max' => 'Nama tidak boleh lebih dari 255 character!',
            'email.required' => 'Email Harus diisi!',
            'email.string' => 'Email harus berupa string!',
            'email.email' => 'Masukan format email dengan benar!',
            'email.max' => 'Maximal Character 255!',
            'email.unique' => 'Email sudah digunakan!',
            'phone.required' => 'Nomor Handphone tidak boleh kosong!',
            'phone.string' => 'Nomor Handphone Harus Berupa String',
            'password.required' => 'File Harus Di Upload.',
        ]);

        if($validator->fails()){
            return back()->with('status', $validator->errors()->first());
        }

        $user = new User();
        $user->nik = $request->input('nik');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->back()->with('status', "User Berhasil diTambahkan!");
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => 'required|string',
        ], [
            'nik.required' => 'NIK tidak boleh kosong!',
            'nik.string' => 'NIK Harus Berupa String',
            'name.required' => 'Nama tidak boleh kosong!',
            'name.string' => 'Nama Harus Berupa String',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter!',
            'email.required' => 'Email Harus diisi!',
            'email.string' => 'Email harus berupa string!',
            'email.email' => 'Masukan format email dengan benar!',
            'email.max' => 'Maksimal 255 karakter!',
            'email.unique' => 'Email sudah digunakan!',
            'phone.required' => 'Nomor Handphone tidak boleh kosong!',
            'phone.string' => 'Nomor Handphone Harus Berupa String',
        ]);

        if($validator->fails()){
            return back()->with('status', $validator->errors()->first());
        }

        $user->nik = $request->input('nik');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->update();

        return redirect()->back()->with('status', "User Berhasil diUpdate!");
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('status', "User Berhasil diHapus!");
    }
}
