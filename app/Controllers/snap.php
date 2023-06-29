<?php

namespace App\Controllers;

class Snap extends BaseController
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {

        // $this->load->helper('url');
        \Midtrans\Config::$serverKey = 'SB-Mid-server-c0oYOjJLZE8dEo0ZWyEy6-2j';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        // return $this->midtrans->config($serverKey);
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
            'order_id' => uniqid(),
            'gross_amount' => $totalNominal, // no decimal allowed for creditcard
        ];

        // Optional
        $item1_details = [
            'id' => uniqid(),
            'price' => $nominal,
            'quantity' => $totalBulan,
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

    public function finish()
    {
        $result = json_decode($this->input->post('result_data'));
        echo 'RESULT <br><pre>';
        var_dump($result);
        echo '</pre>';
    }
}
