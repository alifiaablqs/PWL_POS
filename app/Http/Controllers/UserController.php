<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
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
        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::where('username', 'customer-1')->update($data); // update user data

        // retrieve updated user data
        $users = UserModel::all();

        return view('user', ['data' => $users]); // return the view with updated user data

    }
}