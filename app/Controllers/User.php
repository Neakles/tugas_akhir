<?php

namespace App\Controllers;

class User extends BaseController
{
    public function __construct()
    {
        $this->db           = \Config\Database::connect();
        $this->bill         = $this->db->table("tagihan");
    }
    public function index()
    {
        $data['title'] = 'My Profile';

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
