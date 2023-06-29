<?php

namespace App\Controllers;

use App\Models\UsersModel;


class User extends BaseController
{
    public function __construct()
    {
        $this->db           = \Config\Database::connect();
        $this->builder      = $this->db->table("users");
        $this->gender       = $this->db->table("gender");
        $this->kamar        = $this->db->table("kamar_santri");
        $this->bill         = $this->db->table("tagihan");
        $this->UsersModel   = new UsersModel();

        \Midtrans\Config::$serverKey = 'SB-Mid-server-c0oYOjJLZE8dEo0ZWyEy6-2j';
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

    // tidak berfungsi
    public function tagihan()
    {
        $data['title'] = 'Syahriyah';

        $data["tagihan"] = $this->bill->get()->getResult();
        return view('/user/tagihan', $data);
    }
    // tidak berfungsi

    public function pembayaran()
    {
        $data['title'] = 'Pembayaran';
        $this->builder
            ->select('users.id, tagihan.bulan, tagihan.tahun, nominal, pembayaran.status, pembayaran.tanggal_bayar')
            ->join('pembayaran', 'pembayaran.id_users = users.id')
            ->join('tagihan', 'tagihan.id_tagihan = pembayaran.id_tagihan');
    
        $data['user'] = $this->builder->get()->getRow();
        
        // Menghitung jumlah bulan dan jumlah nominal jika status == 0
        $totalBulan = 0;
        $totalNominal = 0;
        if (!empty($data['user']) && $data['user']->status == 0) {
            $totalBulan = 1; // Set jumlah bulan ke 1 karena status == 0
            $totalNominal = $data['user']->nominal * $totalBulan;
        }
        $data['total_bulan'] = $totalBulan;
        $data['total_nominal'] = $totalNominal;
        $data['nominal'] = $data['user']->nominal;

        return view('/user/pembayaran', $data);
    }

    public function token()
    {
        $this->builder
            ->select('users.id, tagihan.bulan, nominal, pembayaran.status')
            ->join('pembayaran', 'pembayaran.id_users = users.id')
            ->join('tagihan', 'tagihan.id_tagihan = pembayaran.id_tagihan');

        $data['user'] = $this->builder->get()->getRow();
        // Menghitung jumlah bulan dan jumlah nominal jika status == 0
        $totalBulan = 0;
        $totalNominal = 0;
        if (!empty($data['user']) && $data['user']->status == 0) {
            $totalBulan = 1; // Set jumlah bulan ke 1 karena status == 0
            $totalNominal = $data['user']->nominal * $totalBulan;
        }
        // $total_bulan = $totalBulan;
        // $nominal = $data['user']->nominal;
        // $total_nominal = $totalNominal;

        $data['totalBulan'] = $totalBulan;
        $data['totalNominal'] = $totalNominal;
        $data['nominal'] = $data['user']->nominal;


        $transaction_details = [
            'order_id' => uniqid(),
            'gross_amount' => $total_nominal, // no decimal allowed for creditcard
        ];

        // Optional
        $item1_details = [
            'id' => uniqid(),
            'price' => $nominal,
            'quantity' => $total_bulan,
            'name' => 'bulan',
        ];

        // Optional

        // Optional
        $item_details = [$item1_details];

        // Optional
        $billing_address = [
            'first_name' => $fullname,
            'last_name' => 'a',
            'address' => 'a',
            'city' => 'a',
            'postal_code' => 'a',
            'phone' => 'a',
            'country_code' => 'IDN',
        ];

        // Optional
        $shipping_address = [
            'first_name' => $fullname,
            'address' => '',
            'city' => '',
            'postal_code' => '',
            'phone' => $no_telp,
            'country_code' => 'IDN',
        ];

        // Optional
        $customer_details = [
            'first_name' => $fullname,
            'email' => $email,
            'phone' => $no_telp,
            'billing_address' => $billing_address,
            'shipping_address' => $shipping_address,
        ];

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = [
            'start_time' => date('Y-m-d H:i:s O', $time),
            'unit' => 'minute',
            'duration' => 60,
        ];

        $transaction_data = [
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details,
            'credit_card' => $credit_card,
            'expiry' => $custom_expiry,
        ];

        error_log(json_encode($transaction_data));
        $snapToken = \Midtrans\Snap::getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }
}
