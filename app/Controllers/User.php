<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data['title'] = 'My Profile';

        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        return view('/user/index', $data);
    }

    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';

        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        return view('/user/edit_profile', $data);
    }
}
