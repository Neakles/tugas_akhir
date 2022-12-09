<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    // protected $DBGroup          = "default";
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'email',
        'username',
        'fullname',
        'user_image',
        'no_telp',
        'gender_id',
        'kamar',
        'wali',
        'no_wali',
        'thn_masuk',
        'active',
        'password_hash',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    function getusers($nis)
    {
        $db = \Config\Database::connect();
        $sql = 'select * from users where nis = ' . $nis . '';
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }

    function getpembulanan($nis)
    {
        $db = \Config\Database::connect();
        $sql = 'select * from pembayaran_bulanan where nis = ' . $nis . '';
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }

    function getsppbulanan($id, $nis)
    {
        $db = \Config\Database::connect();
        $sql =
            'SELECT a.*, b.nama_bulan, c.tahun_ajaran 
				FROM spp_bulanan a 
				JOIN bulan b ON a.id_bulan = b.id_bulan 
				JOIN tahun_ajaran c ON a.id_tahun = c.id_tahun 
				WHERE a.nis="' .
            $nis .
            '" 
				AND c.tahun_ajaran IN (
					SELECT d.tahun_ajaran FROM pembayaran_bulanan d WHERE d.id_pem_bulan="' .
            $id .
            '" 
				)
				ORDER BY a.id_tahun,a.id_bulan';
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }
    public function id_transaksi()
    {
        $q = $this->db->query(
            'SELECT MAX(RIGHT(id_transaksi,3)) AS kd_max FROM spp_bulanan WHERE DATE(tanggal_bayar)=CURDATE()'
        );
        $kd = 1;
        if ($q->getNumRows() > 0) {
            foreach ($q->getResult() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf('%03s', $tmp);
            }
        } else {
            $kd++;
        }
        $kode = 'SPP-';
        date_default_timezone_set('Asia/Jakarta');
        return $kode . date('dmy') . $kd;
    }
    function tampil_datatahun()
    {
        $db = \Config\Database::connect();
        $sql = "select * from tahun_ajaran where status = 'ON'";
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }
    function tampil_databulan()
    {
        $db = \Config\Database::connect();
        $sql = 'select * from bulan ';
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }
    public function save_batch($data)
    {
        $db = \Config\Database::connect();
        $db->table('spp_bulanan', $data);
    }
}
