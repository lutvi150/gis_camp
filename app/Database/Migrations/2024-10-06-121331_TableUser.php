<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsignned' => true,
                'auto_increment' => true,
            ],
            'nama_user' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'profil_status' =>
            [
                'type' => 'varchar',
                'constraint' => 5,
            ],
            'role' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'last_login' => [
                'type' => 'DATETIME',
            ],
            'created_at' => [
                'type' => 'datetime',
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable("table_user");
    }

    public function down()
    {
        $this->forge->dropTable("table_user");
    }
}
