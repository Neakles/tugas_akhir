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

<<<<<<< HEAD
=======
    function getIdUser($id = false)
    {
        if ($id === false) {
            return $this->select('users.id as userid, username,nis, fullname, email, user_image, gender.sex AS jk, users.gender_id, no_telp, wali, no_wali, thn_masuk, kamar_santri.nama_kamar as kamar')
                ->join('gender', 'gender.id_gender = users.gender_id')
                ->join('kamar_santri', 'kamar_santri.id_kamar = users.kamar')
                ->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }

>>>>>>> 62d7b9c8ffd8058ba29f87dce385f11974ff5cdd
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
<<<<<<< HEAD
        $sql = 'select * from bulan';
=======
        $sql = 'select * from bulan ';
>>>>>>> 62d7b9c8ffd8058ba29f87dce385f11974ff5cdd
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }
    public function save_batch($data)
    {
        $db = \Config\Database::connect();
        $db->table('spp_bulanan', $data);
    }
<<<<<<< HEAD
    function view_all()
    {
        $db = \Config\Database::connect();
        $sql = "select * from spp_bulanan sb left join users u on u.nis = sb.nis 
        left join bulan b on sb.id_bulan = b.id_bulan
        left join tahun_ajaran ta on ta.id_tahun = sb.id_tahun
        where sb.status = 0 order by sb.id_transaksi";
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }
    function nis()
    {
        $db = \Config\Database::connect();
        $sql = 'select * from users';
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }
    function tahun()
    {
        $db = \Config\Database::connect();
        $sql = 'select * from tahun_ajaran';
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }
    public function view_by_date($tanggal1, $tanggal2)
    {
        $db = \Config\Database::connect();
        $sql = "select * from spp_bulanan sb left join users u on u.nis = sb.nis 
        left join bulan b on sb.id_bulan = b.id_bulan
        left join tahun_ajaran ta on ta.id_tahun = sb.id_tahun
        where sb.tanggal_bayar BETWEEN '$tanggal1' and '$tanggal2' order by sb.tanggal_bayar";
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }

    public function view_by_nis($nis)
    {
        $db = \Config\Database::connect();
        $sql = "select * from spp_bulanan sb left join users u on u.nis = sb.nis 
        left join bulan b on sb.id_bulan = b.id_bulan
        left join tahun_ajaran ta on ta.id_tahun = sb.id_tahun
        where sb.nis = '$nis' order by sb.nis";
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }

    public function view_by_year($tahun)
    {
        $db = \Config\Database::connect();
        $sql = "select * from spp_bulanan sb left join users u on u.nis = sb.nis 
        left join bulan b on sb.id_bulan = b.id_bulan
        left join tahun_ajaran ta on ta.id_tahun = sb.id_tahun
        where sb.id_tahun = '$tahun' order by sb.id_tahun";
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }

    function getbln($id, $nis)
    {
        $db = \Config\Database::connect();
        $sql =
            'SELECT a.id_bulan 
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
=======
>>>>>>> 62d7b9c8ffd8058ba29f87dce385f11974ff5cdd
}
