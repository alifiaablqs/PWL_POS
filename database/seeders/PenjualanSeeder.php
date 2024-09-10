<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'pembeli' => 'John Doe',
                'penjualan_kode' => 'PJN001',
                'penjualan_tanggal' => '2024-02-27 08:00:00',
                'user_id' => 1,
            ],
            [
                'penjualan_id' => 2,
                'pembeli' => 'Jane Smith',
                'penjualan_kode' => 'PJN002',
                'penjualan_tanggal' => '2024-02-27 08:30:00',
                'user_id' => 1,
            ],
            [
                'penjualan_id' => 3,
                'pembeli' => 'Michael Johnson',
                'penjualan_kode' => 'PJN003',
                'penjualan_tanggal' => '2024-02-27 09:00:00',
                'user_id' => 1,
            ],
            [
                'penjualan_id' => 4,
                'pembeli' => 'Emily Brown',
                'penjualan_kode' => 'PJN004',
                'penjualan_tanggal' => '2024-02-27 09:30:00',
                'user_id' => 1,
            ],
            [
                'penjualan_id' => 5,
                'pembeli' => 'David Wilson',
                'penjualan_kode' => 'PJN005',
                'penjualan_tanggal' => '2024-02-27 08:00:00',
                'user_id' => 2,
            ],
            [
                'penjualan_id' => 6,
                'pembeli' => 'Jessica Lee',
                'penjualan_kode' => 'PJN006',
                'penjualan_tanggal' => '2024-02-27 08:30:00',
                'user_id' => 2,
            ],
            [
                'penjualan_id' => 7,
                'pembeli' => 'Christopher Taylor',
                'penjualan_kode' => 'PJN007',
                'penjualan_tanggal' => '2024-02-27 08:00:00',
                'user_id' => 2,
            ],
            [
                'penjualan_id' => 8,
                'pembeli' => 'Sarah Martinez',
                'penjualan_kode' => 'PJN008',
                'penjualan_tanggal' => '2024-02-27 08:30:00',
                'user_id' => 3,
            ],
            [
                'penjualan_id' => 9,
                'pembeli' => 'Daniel Garcia',
                'penjualan_kode' => 'PJN009',
                'penjualan_tanggal' => '2024-02-27 08:00:00',
                'user_id' => 3,
            ],
            [
                'penjualan_id' => 10,
                'pembeli' => 'Olivia Rodriguez',
                'penjualan_kode' => 'PJN010',
                'penjualan_tanggal' => '2024-02-27 08:30:00',
                'user_id' => 3,
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
    }

