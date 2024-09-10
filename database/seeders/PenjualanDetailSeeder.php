<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        // Menentukan jumlah transaksi penjualan yang diinginkan
        $jumlah_transaksi = 10;

        // Menambahkan setiap transaksi penjualan dengan 3 barang
        for ($i = 1; $i <= $jumlah_transaksi; $i++) {
            $barang_ids = range(1, 3); // Menyertakan 3 barang dalam setiap transaksi
            foreach ($barang_ids as $barang_id) {
                $data[] = [
                    'detail_id' => count($data) + 1,
                    'harga' => rand(100000, 20000000), // Harga acak untuk setiap barang
                    'jumlah' => rand(1, 5), // Jumlah acak untuk setiap barang
                    'penjualan_id' => $i,
                    'barang_id' => $barang_id,
                ];
            }
        }

        DB::table('t_penjualan_detail')->insert($data);
    }
    }

