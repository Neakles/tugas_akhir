<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\TagihanModel;
use App\Models\UsersModel;
use \IntlDateFormatter;

class TagihanCreate extends BaseCommand
{
    protected $group       = 'custom';
    protected $name        = 'tagihan:create';
    protected $description = 'Create automatic tagihan';

    public function run(array $params)
    {
        $this->userModel    = new UsersModel();
        $this->tagihanModel = new TagihanModel();
        
        // Mendapatkan semua santri
        $santri = $this->userModel->select('users.id, users.nis, users.fullname, users.kamar, users.no_telp, users.nominal, auth_groups_users.group_id')
        ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
        ->where('auth_groups_users.group_id', 2)
        ->findAll();
            
        // Mendapatkan bulan dan tahun saat ini
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-M-Y');
        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        $formatter->setPattern('MMMM');
        $bulan  = $formatter->format(strtotime($tanggal));
        $tahun = date('Y');
        
        // Mengecek apakah tagihan untuk bulan ini sudah ada
        $tagihan = $this->tagihanModel
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->findAll();
            
        if (empty($tagihan)) {
            if (!empty($santri)) {
                $jumlahSantri = count($santri);
                
                // Mendapatkan ID terakhir
                $lastTagihan = $this->tagihanModel
                    ->orderBy('id', 'DESC')
                    ->first();
                $lastId = $lastTagihan ? $lastTagihan['id'] : 0;
                
                // mengambil data syahriyah
                // $syahriyah = $this->request->getPost('j_syahriyah');
                // $nominal = ($syahriyah == 1) ? 250000 : 100000;

                // Menambahkan tagihan untuk setiap santri
                for ($i = 0; $i < $jumlahSantri; $i++) {
                    $data = [
                        'nis'       => $santri[$i]['nis'],
                        'nama'      => $santri[$i]['fullname'],
                        'kamar'     => $santri[$i]['kamar'],
                        'no_telp'   => $santri[$i]['no_telp'],
                        'bulan'     => $bulan,
                        'tahun'     => $tahun,
                        'nominal'   => $santri[$i]['nominal'],
                    ];
                    $this->tagihanModel->insert($data);
                }
                
                CLI::write("Tagihan bulan ini berhasil ditambahkan.", 'green');
            } else {
                CLI::write("Tidak ada santri yang tersedia.", 'yellow');
            }
        } else {
            CLI::write("Tagihan bulan ini sudah ada.", 'yellow');
        }
    }
}