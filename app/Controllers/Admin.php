<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->gender = $this->db->table('gender');
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
        $this->builder->select('users.id as userid, username, fullname, email, user_image, gender.sex AS jk, users.gender_id, no_telp, wali, no_wali, thn_masuk, kamar_santri.nama_kamar as kamar');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->join('gender', 'gender.id_gender = users.gender_id');
        $this->builder->join('kamar_santri', 'kamar_santri.id_kamar = users.kamar');

        $this->builder->where('auth_groups.id', array('id' => 2));
        $query = $this->builder->get();
        $data['users'] = $query->getResult();

        // builder for tambah santri
        $query = $this->gender->get();
        $data['genders'] = $query->getResult();

        return view('admin/data_santri', $data);
    }

    public function getKamar($id_kamar = null)
    {
        $kamar_santri = $this->db->table('kamar_santri')->where('gender_id', $id_kamar)->get()->getResult();
        echo json_encode($kamar_santri);
    }

    public function detail($id = 0)
    {
        $data['title'] = 'Detail Santri';

        // builder for detail santri
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();
        $data['user'] = $query->getRow();
        return view('admin/detail', $data);

        if (empty($data['user'])) {
            return redirect()->to('/admin/detail');
        }
    }

    public function save()
    {
        $data = [
            'username'      => $this->request->getPost('username'),
            'fullname'      => $this->request->getPost('nama'),
            'no_telp'       => $this->request->getPost('no_tlp'),
            'email'         => $this->request->getPost('email'),
            'jk'            => $this->request->getPost('gender'),
            'kamar'         => $this->request->getPost('kamar'),
            'thn_masuk'     => $this->request->getPost('datepicker'),
            'wali'          => $this->request->getPost('wali'),
            'no_wali'       => $this->request->getPost('no_wali'),
            'password_hash' => '$2y$10$VmiCFM8elgi8abYLiWs6Veq.JEegD6E9.dwlvTCdh70fOXBaItIt6',
            'created_at'    => date('Y-m-d H-i-s', strtotime('+13 hours')),
        ];

        $success = $this->builder->insert($data);
        if ($success) {
            session()->setFlashdata('pesan', 'ditambahkan');
            return redirect()->to(base_url('/admin/data_santri'));
        }
    }

    public function edit()
    {
        // $this->builder->select('jk, kamar');
        // $query = $this->builder->get();
        // $data['users'] = $query->getResult();

        // $query = $this->gender->get();
        // $data['genders'] = $query->getResult();

        $id = $this->request->getPost('id');
        $data = [
            'username'      => $this->request->getPost('username'),
            'fullname'      => $this->request->getPost('nama'),
            'no_telp'       => $this->request->getPost('no_tlp'),
            'email'         => $this->request->getPost('email'),
            'jk'            => $this->request->getPost('gender'),
            'kamar'         => $this->request->getPost('kamar'),
            'thn_masuk'     => $this->request->getPost('datepicker'),
            'wali'          => $this->request->getPost('wali'),
            'no_wali'       => $this->request->getPost('no_wali'),
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
}
