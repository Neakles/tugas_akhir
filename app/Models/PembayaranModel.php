<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $allowedFields = ['id_pembayaran', 'id_tagihan', 'id_users', 'tanggal_bayar', 'status'];

    // Tambahkan method untuk menambahkan pembayaran ke dalam tabel pembayaran
}
