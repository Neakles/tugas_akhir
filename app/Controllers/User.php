<?php

namespace App\Controllers;

class User extends BaseController
{
    public function __construct()
    {
        $this->db           = \Config\Database::connect();
        $this->builder      = $this->db->table("users");
        $this->bill         = $this->db->table("tagihan");
        $this->gender       = $this->db->table("gender");
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $this->builder->select('users.id as userid, gender.sex AS jk, kamar_santri.nama_kamar as kamar');
        $this->builder->join('gender', 'gender.id_gender = users.gender_id');
        $this->builder->join('kamar_santri', 'kamar_santri.id_kamar = users.kamar');
        $data["users"] = $this->builder->get()->getResult();

        // $data["user"] = $this->builder->get()->getRow();

        $data['title'] = 'Edit Profile';

        $this->builder->select(
            'users.id as userid, username,nis, fullname, email, user_image, gender.sex AS jk, users.gender_id, no_telp, wali, no_wali, thn_masuk, kamar_santri.nama_kamar as kamar'
        );
        $this->builder->join(
            'auth_groups_users',
            'auth_groups_users.user_id = users.id'
        );
        $this->builder->join('gender', 'gender.id_gender = users.gender_id');
        $this->builder->join(
            'kamar_santri',
            'kamar_santri.id_kamar = users.kamar'
        );

        $data['users'] = $this->builder->get()->getResult();
        $data['genders'] = $this->gender->get()->getResult();

        return view('/user/index', $data);
    }

    public function edit()
    {
        // $this->builder->select('jk, kamar');
        // $data['users'] = $this->builder->get()->getResult();

        // $data['genders'] = $this->gender->get()->getResult();

        $id = $this->request->getPost('id');
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
        ];
        $new = $this->builder->update($data, ['users.id' => $id]);

        if ($new) {
            session()->setFlashdata('pesan', 'diupdate');
            return redirect()->to(base_url('/user/profile'));
        }
    }

    public function tagihan()
    {
        $data['title'] = 'Tagihan';

        $data["tagihan"] = $this->bill->get()->getResult();
        return view('/user/tagihan', $data);
    }
}
