<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Traits\GlobalTrait;
use Throwable;

class Admin extends BaseController
{
    use GlobalTrait;
    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->gender = $this->db->table('gender');
        $this->bill = $this->db->table('pembayaran_bulanan');
        $this->userModel = new UsersModel();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('/admin/index', $data);
    }

    public function data_santri()
    {
        $data['title'] = 'Data Santri';

        // builder for data santri
        $this->builder->select(
            'users.id as userid, username,nis, fullname, email, user_image, gender.sex AS jk, users.gender_id, no_telp, wali, no_wali, thn_masuk, kamar_santri.nama_kamar as kamar'
        );
        $this->builder->join(
            'auth_groups_users',
            'auth_groups_users.user_id = users.id'
        );
        $this->builder->join(
            'auth_groups',
            'auth_groups.id = auth_groups_users.group_id'
        );
        $this->builder->join('gender', 'gender.id_gender = users.gender_id');
        $this->builder->join(
            'kamar_santri',
            'kamar_santri.id_kamar = users.kamar'
        );

        $this->builder->where('auth_groups.id', ['id' => 2]); // id = 2, for show user
        $data['users'] = $this->builder->get()->getResult();

        // builder for tambah santri
        $data['genders'] = $this->gender->get()->getResult();

        return view('admin/data_santri', $data);
    }

    public function getKamar($id_kamar = null)
    {
        $kamar_santri = $this->db
            ->table('kamar_santri')
            ->where('gender_id', $id_kamar)
            ->get()
            ->getResult();
        echo json_encode($kamar_santri);
    }

    public function detail($id = 0)
    {
        $data['title'] = 'Detail Santri';

        // builder for detail santri
        $this->builder->where('users.id', $id);
        $data['user'] = $this->builder->get()->getRow();
        return view('admin/detail', $data);

        if (empty($data['user'])) {
            return redirect()->to('/admin/detail');
        }
    }

    public function save()
    {
        try {
            // DB Transaction
            $this->db->transBegin();

            $data = [
                'username' => $this->request->getPost('username'),
                'fullname' => $this->request->getPost('nama'),
                'no_telp' => $this->request->getPost('no_tlp'),
                'email' => $this->request->getPost('email'),
                'gender_id' => $this->request->getPost('gender'),
                'kamar' => $this->request->getPost('kamar'),
                'thn_masuk' => $this->request->getPost('datepicker'),
                'wali' => $this->request->getPost('wali'),
                'no_wali' => $this->request->getPost('no_wali'),
                'password_hash' =>
                    '$2y$10$VmiCFM8elgi8abYLiWs6Veq.JEegD6E9.dwlvTCdh70fOXBaItIt6', //Rememberm3
                // "password_hash" => '$2y$10$ZlDJEiTYaNyynkOt6mxqIuBCSL1jcd5dCBa.Gll4AIxrDIdPni5li',           //12345678
                // "password_hash" => password_hash("12345678", PASSWORD_DEFAULT),
                'active' => 1,
                'created_at' => date('Y-m-d H-i-s'),
            ];

            $this->userModel->set($data);
            $idData = $this->userModel->insert($data);
            $data = [
                'group_id' => 2,
                'user_id' => $idData,
            ];

            $success = $this->db->table('auth_groups_users')->insert($data);

            $this->db->transCommit();
            if ($success) {
                session()->setFlashdata('pesan', 'ditambahkan');
                return redirect()->to(base_url('/admin/data_santri'));
            }
        } catch (Throwable $th) {
            // Melakukan rollback, data tidak akan insert atau update jika code gagal dieksekusi
            $this->logError($th);
            $this->db->transRollback();
            session()->setFlashdata('pesan', 'ditambahkan');
            return [
                'status' => false,
                'message' => 'Gagal melakukan insert data',
            ];
        }
    }

    public function edit()
    {
        $this->builder->select('jk, kamar');
        $data['users'] = $this->builder->get()->getResult();

        $data['genders'] = $this->gender->get()->getResult();

        $id = $this->request->getPost('id');
        $data = [
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('nama'),
            'no_telp' => $this->request->getPost('no_tlp'),
            'email' => $this->request->getPost('email'),
            'jk' => $this->request->getPost('gender'),
            'kamar' => $this->request->getPost('kamar'),
            'thn_masuk' => $this->request->getPost('datepicker'),
            'wali' => $this->request->getPost('wali'),
            'no_wali' => $this->request->getPost('no_wali'),
        ];
        $new = $this->builder->update($data, ['users.id' => $id]);

        if ($new) {
            session()->setFlashdata('pesan', 'diupdate');
            return redirect()->to(base_url('/admin/data_santri'));
        }
    }

    public function delete($id)
    {
        $drop = $this->builder->delete(['id' => $id]);

        if ($drop) {
            session()->setFlashdata('pesan', 'dihapus');
            return redirect()->to(base_url('/admin/data_santri'));
        }
    }

    public function laporan()
    {
        $data['title'] = 'Laporan Syahriah';

        // builder for data santri
        $this->builder->select(
            'users.id as userid, fullname, gender.sex AS jk, users.gender_id, kamar_santri.nama_kamar as kamar'
        );
        $this->builder->join(
            'auth_groups_users',
            'auth_groups_users.user_id = users.id'
        );
        $this->builder->join(
            'auth_groups',
            'auth_groups.id = auth_groups_users.group_id'
        );
        $this->builder->join('gender', 'gender.id_gender = users.gender_id');
        $this->builder->join(
            'kamar_santri',
            'kamar_santri.id_kamar = users.kamar'
        );

        $this->builder->where('auth_groups.id', ['id' => 2]);
        $data['users'] = $this->builder->get()->getResult();

        $data['genders'] = $this->gender->get()->getResult();

        return view('/admin/laporan', $data);
    }

    public function laporan_syahriah($id = 0)
    {
        $data['title'] = 'Tagihan Syahriah';

        // builder for detail santri
        $this->builder->where('users.id', $id);
        $data['user'] = $this->builder->get()->getRow();
        return view('admin/laporan_syahriah', $data);

        if (empty($data['user'])) {
            return redirect()->to('/admin/laporan');
        }
    }

    public function tagihan()
    {
        $data['title'] = 'Tagihan Santri';

        $data['tagihan'] = $this->bill->get()->getResult();

        return view('/admin/tagihan', $data);
    }
}
