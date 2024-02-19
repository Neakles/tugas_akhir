<?php

namespace App\Controllers;

use App\Models\UsersModel;


class User extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db           = \Config\Database::connect();
        $this->builder      = $this->db->table("users");
        $this->gender       = $this->db->table("gender");
        $this->kamar        = $this->db->table("kamar_santri");
        $this->bill         = $this->db->table("tagihan");
        $this->pay          = $this->db->table("pembayaran");
        $this->UsersModel   = new UsersModel();

        \Midtrans\Config::$serverKey = 'SB-Mid-server-z5T9WhivZDuXrJxC7w-civ_k';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    public function profile()
    {
        $data['title'] = 'My Profile';

        $this->builder->select(
            'users.id as userid, username, nis, fullname, email, user_image, gender.sex AS jk, users.gender_id, no_telp, wali, no_wali, thn_masuk, kamar_santri.nama_kamar as kamar'
        );
        $this->builder->join(
            'auth_groups_users',
            'auth_groups_users.user_id = users.id'
        );
        $this->builder->join(
            'gender',
            'gender.id_gender = users.gender_id'
        );
        $this->builder->join(
            'kamar_santri',
            'kamar_santri.id_kamar = users.kamar'
        );

        $data['users'] = $this->builder->get()->getResult();
        $data['genders'] = $this->gender->get()->getResult();
        $data['kamar_santri'] = $this->kamar->get()->getResult();

        return view('/user/index', $data);
    }

    public function updateProfile($id)
    {
        $data = [
            'id' => $id,
            'fullname' => $this->request->getPost('nama'),
            'no_telp' => $this->request->getPost('no_tlp'),
            'email' => $this->request->getPost('email'),
            'gender_id' => $this->request->getPost('gender'),
            'kamar' => $this->request->getPost('kamar'),
            'thn_masuk' => $this->request->getPost('datepicker'),
            'wali' => $this->request->getPost('wali'),
            'no_wali' => $this->request->getPost('no_wali'),
        ];
        $new = $this->UsersModel->save($data);

        if ($new) {
            session()->setFlashdata('pesan', 'diupdate');
            return redirect()->to(base_url('/user/profile'));
        }
    }

    public function pembayaran()
    {
        $data['title'] = 'Syahriyah';

        $pembayaran = $this->db
            ->table("pembayaran")
            ->select("pembayaran.id_users, pembayaran.status, pembayaran.tanggal_bayar, users.fullname, users.nominal, tagihan.bulan, tagihan.tahun")
            ->join('users', 'pembayaran.id_users = users.id')
            ->join('tagihan', 'tagihan.id_tagihan = pembayaran.id_tagihan')
            ->where("pembayaran.id_users", user()->id)
            ->whereIn("pembayaran.status", [0,1,2,3])
            ->get()->getResult()
            ;

        // Menghitung jumlah bulan dan jumlah nominal
        $totalBulan     = 0;
        $totalNominal   = 0;
        $formatTotalNominal = "Rp 0"; // Set default nilai total nominal
        foreach($pembayaran as $key => $val) {
            $pembayaran[$key]->nominal_format = "Rp " . number_format($val->nominal, 0, ",", ".");
            $totalNominal += $val->nominal;
            $totalBulan++;
        }

        $formatTotalNominal = "Rp " . number_format($totalNominal, 0, ",", ".");
        $formatTotalBulan   = number_format($totalBulan, 0, ",", ".");

        $data["pembayaran"] = $pembayaran;
        $data["bulan"]      = $formatTotalBulan;
        $data["nominal"]    = $formatTotalNominal;

        return view('/user/pembayaran', $data);
    }

    public function pembayaranLama()
    {
        $data['title'] = 'Syahriyah';
        $this->builder
            ->select('users.id, tagihan.bulan, tagihan.tahun, nominal, pembayaran.status, pembayaran.tanggal_bayar')
            ->join('pembayaran', 'pembayaran.id_users = users.id')
            ->join('tagihan', 'tagihan.id_tagihan = pembayaran.id_tagihan');
    
        $data['user'] = $this->builder->get()->getRow();
        $nominal = user()->nominal;

        // format nominal agar menjadi ribuan
        $formattedNominal = number_format($nominal, 0, ',', '.');
        $formattedNominal = 'Rp ' . $formattedNominal;
        $data['nominal'] = $formattedNominal;

        // Menghitung jumlah bulan dan jumlah nominal jika status == 0
        $totalBulan = 0;
        $totalNominal = 0;
        if (!empty($data['user']) && $data['user']->status == 0) {
            $totalBulan = 1; 
            $totalNominal = user()->nominal * $totalBulan;
        }

        // format tampilan total bulan
        $bulan = $totalBulan . ' bulan';
        $data['total_bulan'] = $totalBulan;

        // format nominal agar menjadi ribuan
        $formattedTotNominal = number_format($totalNominal, 0, ',', '.');
        $formatTotNominal = 'Rp ' . $formattedTotNominal;
        $data['total_nominal'] = $formatTotNominal;

        return view('/user/pembayaran', $data);
    }

    public function prosesPembayaran()
    {
        $totBulan   = $this->request->getPost('totalBulan');
        $totNominal = $this->request->getPost('totalNominal');
        $statustype = $this->request->getPost('result_type');
        $statusdata = $this->request->getPost('result_data');
        $json       = json_decode($statusdata);
        $status     = 
            $statustype == 'success'
                ? '2'
                : ($statustype == 'pending'
                    ? '1'
                    : '3');
        $orderid    = $json->order_id;
        $index      = 0; 
        $nis        = $this->pay->select('nis');
        $time       = time();

        $data = [
            'tanggal_bayar' => date('Y-m-d H:i:s O', $time),
            'status' => $status,
            'total_bulan' => $totBulan,
            'total_nominal' => $totNominal,
        ];
        // dd($data);
        $this->pay->set($data)->where('nis' == user()->nis);
        $this->pay->update();
        return redirect()->to('/user/pembayaran');
    }
}
