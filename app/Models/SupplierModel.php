<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    use HasFactory;
    protected $table = 'm_supplier';
    protected $primaryKey = 'supplier_id';
    public $timestamps = false; // jika tabel tidak menggunakan created_at dan updated_at

    protected $fillable = ['supplier_kode', 'supplier_nama', 'supplier_alamat'];
}
