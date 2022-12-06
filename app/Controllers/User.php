<?php

namespace App\Controllers;

class User extends BaseController
{
    public function __construct()
    {
        $this->db           = \Config\Database::connect();
        $this->builder      = $this->db->table("users");
        $this->bill         = $this->db->table("tagihan");
    }
    public function profile()
    {
        $data['title'] = 'My Profile';
        $this->builder->select('users.id as userid, gender.sex AS jk, kamar_santri.nama_kamar as kamar');
        $this->builder->join('gender', 'gender.id_gender = users.gender_id');
        $this->builder->join('kamar_santri', 'kamar_santri.id_kamar = users.kamar');
        $data["users"] = $this->builder->get()->getResult();

        // $data["user"] = $this->builder->get()->getRow();

        return view('/user/index', $data);
    }

    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';

        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        return view('/user/edit_profile', $data);
    }

    public function tagihan()
    {
        $data['title'] = 'Tagihan';

        $data["tagihan"] = $this->bill->get()->getResult();
        return view('/user/tagihan', $data);
    }
}
