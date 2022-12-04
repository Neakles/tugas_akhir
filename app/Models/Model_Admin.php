<?php
namespace App\Models;
use CodeIgniter\Model;

class Model_Admin extends Model
{
    public function Simpan_Data($data)
    {
        $this->db = db_connect();
        $this->db->table('users')->insert($data);
    }
}

?>