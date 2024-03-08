<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use App\Traits\GlobalTrait;
use App\Models\UsersModel;
use App\Models\TagihanModel;
use App\Models\PembayaranModel;
use \IntlDateFormatter;

class Midtrans extends BaseController
{
    use GlobalTrait;
    protected $db, $builder;

    public function __construct()
    {
        $this->db               = \Config\Database::connect();
        $this->builder          = $this->db->table('pembayaran');
        $this->user             = $this->db->table('users');
        $this->userModel        = new UsersModel();
        $this->tagihanModel     = new TagihanModel();
        $this->pembayaranModel  = new PembayaranModel();

        \Midtrans\Config::$serverKey = 'SB-Mid-server-DdFcR4RsqWPdJHGoiSnRfP1d';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }

    public function index()
    {
        if (in_groups('user')) {
            $this->builder->where('user_id', user()->id);
            $this->builder->orderBy('order_id', 'DESC');
            $query = $this->builder->get();
        } else {
            $this->builder->orderBy('order_id', 'DESC');
            $query = $this->builder->get();
        }

        $data = [
            'title' => 'Payment List',
            'order' => $query->getResult(),
        ];
        return view('midtrans/index', $data);
    }

    public function bill()
    {
        // Mendapatkan bulan dan tahun saat ini
        date_default_timezone_set('Asia/Jakarta');
        $tanggal    = date('d-M-Y');
        $formatter  = new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        $formatter->setPattern('MMMM');
        $bulan      = $formatter->format(strtotime($tanggal));
        $tahun      = date('Y');

        // Mengecek apakah tagihan untuk bulan ini sudah dikirim
        $tagihanExists = $this->tagihanModel
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->countAllResults() > 0;

        $id_tagihan = date('Ym');
        
        if (!$tagihanExists) {
            // Menyimpan tagihan      
            $data = [
                'id_tagihan' => $id_tagihan,
                'bulan'     => $bulan,
                'tahun'     => $tahun,
            ];
            $this->tagihanModel->insert($data);

            // Mendapatkan data santri
            $santri = $this->userModel->select('users.id, users.nis, auth_groups_users.group_id')
                ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                ->where('auth_groups_users.group_id', 2)
                ->findAll();   

            if (!empty($santri)) {
                $tanggal = date('my');
                // Mendapatkan ID terakhir
                $lastTagihan = $this->tagihanModel
                    ->orderBy('id_tagihan', 'DESC')
                    ->first();
                $last_tagihan = $lastTagihan ? $lastTagihan['id_tagihan'] : 0;

                // Menambahkan tagihan untuk setiap santri
                foreach ($santri as $row) {
                    $data = [
                        'id_pembayaran' => date('mY').$row['nis'],
                        'id_tagihan'    => $id_tagihan,
                        'id_users'      => $row['id'],
                        'status'        => 0,
                    ];
                    $this->pembayaranModel->insert($data);
                        }

                // Kirim email tagihan ke setiap santri
                // Implementasikan logika pengiriman email sesuai dengan preferensi Anda

                echo "Tagihan bulan ini berhasil dikirim";
            } else {
                echo "Tidak ada santri yang tersedia.";
            }
        } else {
            echo "Tagihan bulan ini sudah dikirim.";
        }
    }   

    public function search_filter()
    {
        if ($this->request->isAJAX()) {
            $minval = $this->request->getVar('first_date');
            $maxval = $this->request->getVar('last_date');

            if (in_groups('user')) {
                $this->builder->where('user_id', user()->id);
                $this->builder->where('transaction_time >=', $minval);
                $this->builder->where('transaction_time <=', $maxval);
                $this->builder->orderBy('order_id', 'DESC');
                $query = $this->builder->get();
            } else {
                $this->builder->where('transaction_time >=', $minval);
                $this->builder->where('transaction_time <=', $maxval);
                $this->builder->orderBy('order_id', 'DESC');
                $query = $this->builder->get();
            }

            $data = [
                'order' => $query->getResult(),
            ];
            $msg = [
                'data' => view('midtrans/ajax_filter_date', $data),
            ];
            echo json_encode($msg);
        } // Search Filter With ajax request
    }

    public function pembayaran()
    {
        $data = [
            'title' => 'Invoice',
        ];
        return view('midtrans/pembayaran', $data);
    }

    public function token()
    {
        $first_name = $this->request->getVar('first_name');
        $last_name = $this->request->getVar('last_name');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $address = $this->request->getVar('address');
        $total = $this->request->getVar('total');
        $nama_pembayaran = $this->request->getVar('nama_pembayaran');

        $transaction_details = [
            'order_id' => time(),
            'gross_amount' => $total, // no decimal allowed for creditcard
        ];

        // Optional
        $item1_details = [
            'id' => 'a1',
            'price' => $total,
            'quantity' => 1,
            'name' => $nama_pembayaran,
        ];

        // Optional
        $item_details = [$item1_details];

        // Optional
        $billing_address = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'address' => $address,
            'city' => 'Semarang',
            'postal_code' => '16602',
            'phone' => $phone,
            'country_code' => 'IDN',
        ];

        // Optional
        $customer_details = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'billing_address' => $billing_address,
            // 'shipping_address' => $shipping_address
        ];

        // Optional, remove this to display all available payment methods
        // $enable_payments = array('credit_card', 'cimb_clicks', 'mandiri_clickpay', 'echannel');

        // Fill transaction details
        $transaction = [
            // 'enabled_payments' => $enable_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        ];

        error_log(json_encode($transaction));
        $snapToken = \Midtrans\Snap::getSnapToken($transaction);
        error_log($snapToken);
        echo $snapToken;
    }

    public function handling()
    {
        $request    = \Config\Services::request();
        $body       = $request->getBody();
        $bodyFormat = json_decode($body);
        $this->logError(null, "handling\n" . json_encode($body));

        // Jika settlement transaksi berhasil
        if(@$bodyFormat->transaction_status == "settlement"){
            // Query untuk update 
            $column = [
                "tanggal_bayar" => date("Y-m-d"),
                "status"        => 2,
            ];
            $query = $this->builder->update($column, ['order_id' => @$bodyFormat->order_id]);
        } elseif(@$bodyFormat->transaction_status == "pending"){
            $column = [
                "status"        => 1,
            ];
            $query = $this->builder->update($column, ['order_id' => @$bodyFormat->order_id]);
        }
        return @$body;
    }

    public function finish()
    {
        $request = \Config\Services::request();
        $body = $request->getBody();
        $bodyFormat = json_decode($body);
        $this->logError(null, "finish\n" . json_encode($body));
        return $bodyFormat->transaction_status;
    }

    public function unfinish()
    {
        $request = \Config\Services::request();
        $body = $request->getBody();
        $this->logError(null, "unfinish\n" . json_encode($body));
        return $body;
    }

    public function error()
    {
        $request = \Config\Services::request();
        $body = $request->getBody();
        $this->logError(null, "error\n" . json_encode($body));
        return $body;
    }

    public function finishLama()
    {
        $result = json_decode($this->request->getVar('result_data'), true);

        // Pengkondisian Pembayaran Kartu Kredit
        if ($result['payment_type'] == 'credit_card') {
            $creditcard = 'credit card';

            $savedata = [
                'order_id' => $result['order_id'],
                'user_id' => user()->id,
                'first_name' => user()->first_name,
                'last_name' => user()->last_name,
                'gross_amount' => $result['gross_amount'],
                'payment_type' => $creditcard,
                'transaction_time' => $result['transaction_time'],
                'bank' => $result['bank'],
                'va_number' => 'N/A',
                'pdf_url' => $result['redirect_url'],
                'status_code' => $result['status_code'],
            ];

            $simpan = $this->builder->insert($savedata);
            if ($simpan) {
                session()->setFlashData('pesan', 'Transaksi baru ditambahkan');
                return redirect()->to('/');
            } else {
                echo 'gagal';
            }
            // Pengkondisian transfer Mandiri
        } elseif ($result['payment_type'] == 'echannel') {
            $savedata = [
                'order_id' => $result['order_id'],
                'user_id' => user()->id,
                'first_name' => user()->first_name,
                'last_name' => user()->last_name,
                'gross_amount' => $result['gross_amount'],
                'payment_type' => 'bank transfer',
                'transaction_time' => $result['transaction_time'],
                'bank' => 'mandiri',
                'va_number' => $result['bill_key'],
                'pdf_url' => $result['pdf_url'],
                'status_code' => $result['status_code'],
            ];

            $simpan = $this->builder->insert($savedata);
            if ($simpan) {
                session()->setFlashData('pesan', 'Transaksi baru ditambahkan');
                return redirect()->to('/');
            } else {
                echo 'gagal';
            }
            // Pengkondisian Transfer Bank Permata
        } elseif (isset($result['permata_va_number'])) {
            $savedata = [
                'order_id' => $result['order_id'],
                'user_id' => user()->id,
                'first_name' => user()->first_name,
                'last_name' => user()->last_name,
                'gross_amount' => $result['gross_amount'],
                'payment_type' => 'bank transfer',
                'transaction_time' => $result['transaction_time'],
                'bank' => 'permata',
                'va_number' => $result['permata_va_number'],
                'pdf_url' => $result['pdf_url'],
                'status_code' => $result['status_code'],
            ];

            $simpan = $this->builder->insert($savedata);
            if ($simpan) {
                session()->setFlashData('pesan', 'Transaksi baru ditambahkan');
                return redirect()->to('/');
            } else {
                echo 'gagal';
            }
        } else {
            if ($result['payment_type'] == 'bank_transfer') {
                $banktransfer = 'bank transfer';
            }
            $savedata = [
                'order_id' => $result['order_id'],
                'user_id' => user()->id,
                'first_name' => user()->first_name,
                'last_name' => user()->last_name,
                'gross_amount' => $result['gross_amount'],
                'payment_type' => $banktransfer,
                'transaction_time' => $result['transaction_time'],
                'bank' => $result['va_numbers'][0]['bank'],
                'va_number' => $result['va_numbers'][0]['va_number'],
                'pdf_url' => $result['pdf_url'],
                'status_code' => $result['status_code'],
            ];

            $simpan = $this->builder->insert($savedata);

            if ($simpan) {
                session()->setFlashData('pesan', 'Data baru ditambahkan');
                return redirect()->to('/');
            } else {
                echo 'gagal';
            }
        }
    }

    public function excel()
    {
        $minval = $this->request->getVar('first_date');
        $maxval = $this->request->getVar('last_date');

        if (in_groups('user')) {
            $this->builder->where('user_id', user()->id);
            $this->builder->where('transaction_time >=', $minval);
            $this->builder->where('transaction_time <=', $maxval);
            $this->builder->orderBy('order_id', 'DESC');
            $query = $this->builder->get();
        } else {
            $this->builder->where('transaction_time >=', $minval);
            $this->builder->where('transaction_time <=', $maxval);
            $this->builder->orderBy('order_id', 'DESC');
            $query = $this->builder->get();
        }

        $data = [
            'list' => $query->getResult(),
            'title' => 'Excel',
        ];
        return view('midtrans/excel', $data);
    }
}
