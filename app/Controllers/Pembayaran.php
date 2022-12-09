<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Traits\GlobalTrait;

use Throwable;

class Pembayaran extends BaseController
{
    use GlobalTrait;
    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->gender = $this->db->table('gender');
        $this->bill = $this->db->table('tagihan');
        $this->userModel = new UsersModel();
    }
    public function pembayaran()
    {
        $data['title'] = 'Pembayaran';
        $this->builder->select('nis, fullname');
        $data['users'] = $this->builder->get()->getResult();
        return view('/user/pembayaran', $data);
    }
    public function detail($nis)
    {
        $data['title'] = 'Detail Pembayaran';
        $data['users'] = $this->userModel->getusers($nis);
        $data['pembayaran_bulanan'] = $this->userModel->getpembulanan($nis);

        return view('/user/detail', $data);
    }
    public function spp_bulanan($id, $nis)
    {
        $data['title'] = 'Spp Bulanan';
        $data['users'] = $this->userModel->getusers($nis);
        $data['id_transaksi'] = $this->userModel->id_transaksi();
        $data['tgl_bayar'] = date('Y-m-d');
        $data['id_pem_bulan'] = $id;
        $data['tahun_ajaran'] = $this->userModel->tampil_datatahun();
        $data['thaj'] = $this->db
            ->query(
                "SELECT b.id_tahun 
						FROM pembayaran_bulanan a
						inner join tahun_ajaran b ON a.tahun_ajaran = b.tahun_ajaran  
						WHERE a.id_pem_bulan='" .
                    $id .
                    "'"
            )
            ->getrow()->id_tahun;
        $data['spp_bulanan'] = $this->userModel->getsppbulanan($id, $nis);
        $data['bln'] = $this->userModel->tampil_databulan();

        return view('/user/spp_bulanan', $data);
    }
    public function tambah_aksi()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('spp_bulanan');
        // Ambil data yang dikirim dari form
        $bulan = $this->request->getPost('bulan[]');

        $nis = $this->request->getPost('nis');
        $fullname = $this->request->getPost('fullname');
        // $id_trans = rand(000000, 999999);
        $id_transaksi = $this->request->getPost('id_transaksi');
        $tgl_bayar = $this->request->getPost('tgl_bayar');
        $id_tahun = $this->request->getPost('tahun_ajaran');
        $metode_pembayaran = $this->request->getPost('metode_pembayaran');
        $id = $this->request->getPost('id');
        $idpembulan = $this->request->getPost('id_pem_bulan');
        $data = [];
        $statustype = $this->request->getPost('result_type');
        $statusdata = $this->request->getPost('result_data');
        $json = json_decode($statusdata);
        //echo $json['order_id'];exit;
        $status =
            $metode_pembayaran == 'Manual'
                ? '0'
                : ($statustype == 'success'
                    ? '0'
                    : ($statustype == 'pending'
                        ? '1'
                        : '2'));
        $orderid = $metode_pembayaran == 'Manual' ? '' : $json['order_id'];
        $no_virtual =
            $metode_pembayaran == 'Manual'
                ? ''
                : $json['va_numbers'][0]['va_number'] .
                    '|' .
                    $json['va_numbers'][0]['bank'];
        $index = 0; // Set index array awal dengan 0
        #penyesuaian tambahan untuk simpan jumlah tabel spp_bulanan
        $jmlspp = $this->db
            ->query(
                "select besar_spp from tahun_ajaran where id_tahun = '" .
                    $id_tahun .
                    "'"
            )
            ->getrow()->besar_spp;
        foreach ($bulan as $key) {
            // Kita buat perulangan berdasarkan nis sampai data terakhir
            array_push($data, [
                'id_bulan' => $key,
                'nis' => $nis, // Ambil dan set data nama sesuai index array dari $index
                'nama_santri' => $fullname,
                // 'id_trans' => $id_trans,  // Ambil dan set data telepon sesuai index array dari $index
                'id_transaksi' => $id_transaksi++,
                'tanggal_bayar' => $tgl_bayar,
                'metode_pembayaran' => $metode_pembayaran,
                'jumlah' => $jmlspp,
                'id_tahun' => $id_tahun,
                'id' => $id, // Ambil dan set data alamat sesuai index array dari $index
                'Status' => $status,
                'order_id' => $orderid,
                'no_virtual' => $no_virtual,
            ]);

            $key;
        }
        // var_dump($idpembulan);
        // die();
        $sql = $builder->insertBatch($data);
        // var_dump($key);
        // die();
        return redirect()->to(
            '/pembayaran/spp_bulanan/' . $idpembulan . '/' . $nis . ' '
        );
    }
}
