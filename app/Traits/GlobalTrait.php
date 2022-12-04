<?php

namespace App\Traits;

trait GlobalTrait {

    /**
     * Untuk menyimpan log error
     *
     * @author Bayu Fajariyanto <bayuf08@gmail.com>
     *
     * @param   json    $message        Untuk menyimpan error dari try catch
     * @param   string  $customMessage  Untuk mengisi pesan secara custom
     * @return  string  $text           return response data error dari try catch atau custom message dan mengirim ke telegram
     */
    public function logError($message, $customMessage = "")
    {
        date_default_timezone_set("Asia/Jakarta");
        $token      = env("TELEGRAM_BOT_TOKEN", "5797051837:AAF13GodwiDA6ACyBqyNsUh_JadII3fBQbk");
        $chat_id    = env("TELEGRAM_CHAT_ID", "-1001619747687");
        $result     = null;

        if (!empty($chat_id)) {
            $text = "<pre>";

            if (empty($customMessage)) {
                $text .= date("d-m-Y H:i:s") . " \n \n";
                $text .= "Author : " . env("AUTHOR") . " | " . $this->get_ip() . " \n \n";
                $text .= $message->getFile() . " | Line : " . $message->getLine() . " \n \n";
                $text .= $message->getMessage() . " \n \n";
            } else {
                $text .= date("d-m-Y H:i:s") . " \n \n";
                $text .= "Author : " . env("AUTHOR") . " | " . $this->get_ip() . " \n \n";
                $text .= $customMessage;
            }

            $text .= " </pre>";

            try {
                $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($text) . "&parse_mode=HTML";
                $ch = curl_init();
                $optArray = [CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true];
                curl_setopt_array($ch, $optArray);
                $result = curl_exec($ch);
                curl_close($ch);
                return $text;
            } catch (\Throwable $th) {
                $this->logError($th);
                return $th;
            }
        }

        return $result; // Jika null chat id tidak ditemukan
    }

    function get_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }
}