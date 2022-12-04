<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    // protected $DBGroup          = "default";
    protected $table            = "users";
    protected $primaryKey       = "id";
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = "array";
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "email",
        "username",
        "fullname",
        "user_image",
        "no_telp",
        "gender_id",
        "kamar",
        "wali",
        "no_wali",
        "thn_masuk",
        "password_hash"
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = "datetime";
    protected $createdField  = "created_at";
    protected $updatedField  = "updated_at";
    protected $deletedField  = "deleted_at";
}
