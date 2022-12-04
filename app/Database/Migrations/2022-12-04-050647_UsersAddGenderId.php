<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersAddGenderId extends Migration
{
    public function up()
    {
        $this->forge->addColumn("users", [
            "gender_id" => [
                "type"          => "INT",
                "constraint"    => 5,
                "null"          => true,
                "after"         => "jk"
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn("users", "gender_id");
    }
}
