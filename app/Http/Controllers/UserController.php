<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {        
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }

    public function tambah()
    {
        return view ('user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('request->password'),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }
}

//Praktikum 3
        /* coba akses model UserModel
         $user = UserModel::all(); // ambil semua data dari tabel m_user
         return view('user', ['data' => $user]);
        

        // tambah data user dengan eloquent model
         $data = [
             'username' => 'customer-1',
             'nama' => 'Pelanggan',
             'password' => Hash::make('12345'),
             'level_id' => 3
         ];
         UserModel::insert($data); //tambahkan data ke tabel m_ser

        //coba akses model userModel
         $user = UserModel::all(); //ambil semua data dari tabel m_user
         return view('user', ['data' => $user]);
        */
        // tambah data user dengan Eloquent Model
        /*$data = [
            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::where('username', 'customer-1')->update($data); // update user data

        // retrieve updated user data
        $users = UserModel::all();

        return view('user', ['data' => $users]); // return the view with updated user data
        */