<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table("auth_goups_users");
    }

    public function index()
    {
        if ("role:user") {
            return redirect()->to("/admin");
        } else {
            return redirect()->to("/user");
        }
    }
}
