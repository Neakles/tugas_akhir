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
        $this->spp_bulanan = $this->db->table('spp_bulanan');
        $this->userModel = new UsersModel();

        \Midtrans\Config::$serverKey = 'SB-Mid-server-z5T9WhivZDuXrJxC7w-civ_k';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $getorder = $this->userModel->sppbulanan();
        foreach ($getorder as $a) {
            // echo ($a->order_id . '<br>');
            $status = \Midtrans\Transaction::status($a->order_id);
            if ($status->status_code == 200) {
                $data = [
                    'status' => 0,
                ];
                $this->spp_bulanan->where('order_id', $a->order_id);
                $this->spp_bulanan->update($data);
                // var_dump($cek);
                // die;
            }
        }
    }
    public function index()
    {
        $data['title'] = 'Pembayaran';
        $this->builder->select('nis, fullname')->join(
            'auth_groups_users',
            'auth_groups_users.user_id = users.id'
        )->join(
            'auth_groups',
            'auth_groups.id = auth_groups_users.group_id'
        )->where('auth_groups.id', ['id' => 2]);
        $data['users'] = $this->builder->get()->getResult();
        return view('/admin/pembayaran', $data);
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
                "SELECT b.besar_spp 
						FROM pembayaran_bulanan a
						inner join tahun_ajaran b ON a.tahun_ajaran = b.tahun_ajaran  
						WHERE a.id_pem_bulan='" .
                    $id .
                    "'"
            )
            ->getrow()->besar_spp;
        $data['id_tahun'] = $this->db
            ->query(
                "SELECT b.id_tahun 
						FROM pembayaran_bulanan a
						inner join tahun_ajaran b ON a.tahun_ajaran = b.tahun_ajaran  
						WHERE a.id_pem_bulan='" .
                    $id .
                    "'"
            )
            ->getrow()->id_tahun;
        $data['pem_bulan'] = $this->userModel->getsppbulanan($id, $nis);
        $data['disbln'] =  $this->userModel->getbln($id, $nis);
        $data['bln'] = $this->userModel->tampil_databulan();
        return view('/user/spp_bulanan', $data);
    }
    public function tambah_aksi()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('spp_bulanan');
        $bulan = $this->request->getPost('bulan[]');
        $nis = $this->request->getPost('nis');
        $fullname = $this->request->getPost('fullname');
        $id_transaksi = $this->request->getPost('id_transaksi');
        $tgl_bayar = $this->request->getPost('tgl_bayar');
        $id_tahun = $this->request->getPost('id_tahun');
        $metode_pembayaran = $this->request->getPost('metode_pembayaran');
        // $id = $this->request->getPost('id');
        $idpembulan = $this->request->getPost('id_pem_bulan');
        $besarspp = $this->request->getPost('besar_spp');
        $data = [];
        $statustype = $this->request->getPost('result_type');
        $statusdata = $this->request->getPost('result_data');
        $json = json_decode($statusdata);
        $status =
            $metode_pembayaran == 'Manual'
            ? '0'
            : ($statustype == 'success'
                ? '0'
                : ($statustype == 'pending'
                    ? '1'
                    : '2'));
        $orderid = $metode_pembayaran == 'Manual' ? '' : $json->order_id;
        $index = 0; // Set index array awal dengan 0

        foreach ($bulan as $key) {

            array_push($data, [
                'id_bulan' => $key,
                'nis' => $nis,
                'nama_santri' => $fullname,
                'id_transaksi' => $id_transaksi++,
                'tanggal_bayar' => $tgl_bayar,
                'metode_pembayaran' => $metode_pembayaran,
                'jumlah' => $besarspp,
                'id_tahun' => $id_tahun,
                // 'id' => $id,
                'Status' => $status,
                'order_id' => $orderid,
            ]);
            $key;
        }
        $sql = $builder->insertBatch($data);
        return redirect()->to(
            '/pembayaran/spp_bulanan/' . $idpembulan . '/' . $nis . ' '
        );
    }
    public function delete_spp($id, $idpembulan, $nis)
    {

        $this->spp_bulanan->delete(['id_transaksi' => $id]);

        return redirect()->to('/pembayaran/spp_bulanan/' . $idpembulan . '/' . $nis . ' ');
    }
    function laporan_spp()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if ($filter == '1') {
                $tanggal1 = $_GET['tanggal'];
                $tanggal2 = $_GET['tanggal2'];
                $ket =
                    'Data Transaksi dari Tanggal ' .
                    date('d-m-y', strtotime($tanggal1)) .
                    ' - ' .
                    date('d-m-y', strtotime($tanggal2));
                $url_cetak =
                    'pembayaran/cetak1?tanggal1=' .
                    $tanggal1 .
                    '&tanggal2=' .
                    $tanggal2 .
                    '';
                $spp_bulanan = $this->userModel->view_by_date(
                    $tanggal1,
                    $tanggal2
                );
            } elseif ($filter == '2') {
                $nis = $_GET['nis'];
                $ket = 'Data Transaksi dengan Nomor Induk ' . $nis;
                $url_cetak = 'pembayaran/cetak2?&nis=' . $nis;
                $spp_bulanan = $this->userModel->view_by_nis($nis);
            } else {
                $tahun = $_GET['tahun'];
                $ket = 'Data Transaksi Tahun Ajaran ' . $tahun;
                $url_cetak = 'pembayaran/cetak4?&tahun=' . $tahun;
                $spp_bulanan = $this->userModel->view_by_year($tahun);
            }
        } else {
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'pembayaran/cetak';
            $spp_bulanan = $this->userModel->view_all();
        }
        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['spp_bulanan'] = $spp_bulanan;
        $data['nis'] = $this->userModel->nis();
        $data['tahun'] = $this->userModel->tahun();
        $data['title'] = 'Laporan Data Pembayaran SPP';

        return view('user/laporan', $data);
    }
    public function cetak()
    {
        $ket = 'Semua Data Transaksi';
        ob_start();

        $data['spp_bulanan'] = $this->userModel->view_all();
        $data['ket'] = $ket;
        return view('user/cetak_spp', $data);
    }
    public function cetak1()
    {
        $tanggal1 = $_GET['tanggal1'];
        $tanggal2 = $_GET['tanggal2'];
        $ket =
            'Data Transaksi dari Tanggal ' .
            date('d-m-y', strtotime($tanggal1)) .
            ' s/d ' .
            date('d-m-y', strtotime($tanggal2));
        ob_start();

        $data['spp_bulanan'] = $this->userModel
            ->view_by_date($tanggal1, $tanggal2);

        $data['ket'] = $ket;
        return view('user/cetak_spp', $data);
    }
    public function cetak2()
    {
        $nis = $_GET['nis'];
        $ket = 'Data Transaksi dengan Nomor Induk ' . $nis;
        ob_start();

        $data['spp_bulanan'] = $this->userModel->view_by_nis($nis);
        $data['ket'] = $ket;
        return view('user/cetak_spp', $data);
    }
    public function cetak3()
    {
        $kelas = $_GET['kelas'];
        $tahun = $_GET['tahun'];
        $ket = 'Data Transaksi Kelas ' . $kelas . ' Tahun Ajaran' . $tahun;
        ob_start();

        $data['spp_bulanan'] = $this->userModel
            ->view_by_kelas($kelas, $tahun);
        $data['ket'] = $ket;
        $this->load->view('user/preview', $data);
    }
    public function cetak4()
    {
        $tahun = $_GET['tahun'];
        $ket = 'Data Transaksi Tahun Ajaran ' . $tahun;
        ob_start();

        $data['spp_bulanan'] = $this->userModel
            ->view_by_year($tahun);
        $data['ket'] = $ket;
        return view('user/cetak_spp', $data);
    }
}
