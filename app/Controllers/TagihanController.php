<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\TagihanModel;
use App\Models\PembayaranModel;
use \IntlDateFormatter;
use App\Traits\GlobalTrait;

class TagihanController extends BaseController
{
    use GlobalTrait;
    protected $db, $builder;
    
    public function __construct()
    {
        $this->db           = \Config\Database::connect();
        $this->user         = $this->db->table('users');
        $this->userModel    = new UsersModel();
        $this->tagihanModel = new TagihanModel();
        $this->pembayaranModel = new PembayaranModel();
    }

    public function autoAddTagihan()
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

        $id_tagihan = date('mmY');

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
}
