<?php

namespace App\Controllers;

class Snap extends BaseController
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-c0oYOjJLZE8dEo0ZWyEy6-2j';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    public function index()
    {
        $this->load->view('chekout_snap');
    }

    public function token()
    {
        $fullname = user()->fullname;
        $email = user()->email;
        $no_telp = user()->no_telp;
        $nominal = user()->nominal;
        $totalBulan = $this->request->getPost('total_bulan');
        $totalNominal = $this->request->getPost('total_nominal');

        $transaction_details = [
            'order_id' => rand(),
            'gross_amount' => $totalNominal, 
        ];

        $item1_details = [
            'id' => rand(),
            'price' => $nominal,
            'quantity' => $totalBulan,
            'name' => 'bulan',
        ];

        $item_details = [$item1_details];

        $billing_address = [
            'first_name' => $fullname,
            'last_name' => 'a',
            'address' => 'a',
            'city' => 'a',
            'postal_code' => 'a',
            'phone' => 'a',
            'country_code' => 'IDN',
        ];

        $shipping_address = [
            'first_name' => $fullname,
            'address' => 'Jl. Jemursari Utara III/9',
            'city' => 'Surabaya',
            'postal_code' => '60237',
            'phone' => $no_telp,
            'country_code' => 'IDN',
        ];

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

    public function finish()
    {
        $result = json_decode($this->input->post('result_data'));
        echo 'RESULT <br><pre>';
        var_dump($result);
        echo '</pre>';
    }
}
