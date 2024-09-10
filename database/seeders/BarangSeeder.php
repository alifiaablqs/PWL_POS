<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Sepatu',
                'harga_beli' => 500000,
                'harga_jual' => 600000,
                'kategori_id' => 1,
            ],
            [
                'barang_id' => 2,
                'barang_kode' => 'BRG002',
                'barang_nama' => 'Smartphone',
                'harga_beli' => 2000000,
                'harga_jual' => 4000000,
                'kategori_id' => 1,
            ],
            [
                'barang_id' => 3,
                'barang_kode' => 'BRG003',
                'barang_nama' => 'T-Shirt',
                'harga_beli' => 65000,
                'harga_jual' => 100000,
                'kategori_id' => 2,
            ],
            [
                'barang_id' => 4,
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Jeans',
                'harga_beli' => 100000,
                'harga_jual' => 200000,
                'kategori_id' => 2,
            ],
            [
                'barang_id' => 5,
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Sepidol',
                'harga_beli' => 2000,
                'harga_jual' => 5000,
                'kategori_id' => 3,
            ],
            [
                'barang_id' => 6,
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Buku Tulis',
                'harga_beli' => 5000,
                'harga_jual' => 10000,
                'kategori_id' => 3,
            ],
            [
                'barang_id' => 7,
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Makaroni',
                'harga_beli' => 1000,
                'harga_jual' => 2000,
                'kategori_id' => 4,
            ],
            [
                'barang_id' => 8,
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Lee Mineral 1,5Lt',
                'harga_beli' => 5000,
                'harga_jual' => 10000,
                'kategori_id' => 4,
            ],
            [
                'barang_id' => 9,
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Teh Pucuk',
                'harga_beli' => 3000,
                'harga_jual' => 5000,
                'kategori_id' => 5,
            ],
            [
                'barang_id' => 10,
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Nescafe',
                'harga_beli' => 5000,
                'harga_jual' => 8000,
                'kategori_id' => 5,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
    }

