<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Admin extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function Simpan_Data($data)
    {
        $this->db->table('users')->insert($data);
    }

    public function FunctionName()
    {
    }
    
}
