<?php

namespace App\Models;

use CodeIgniter\Model;

class TagihanModel extends Model
{
    protected $table = 'pembayaran_bulanan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nis', 'nama', 'kamar', 'no_telp', 'tahun', 'bulan', 'nominal', 'group_id'];
}