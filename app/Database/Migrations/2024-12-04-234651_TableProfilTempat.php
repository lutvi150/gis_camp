<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableProfilTempat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tempat' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsignned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'nama_tempat' => [
                'type' => 'text',
            ],
            'foto' => [
                'type' => 'text',
            ],
            'profil_status' =>
            [
                'type' => 'varchar',
                'constraint' => 5,
            ],
            'jarak' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'lokasi' => [
                'type' => 'text',
            ],
            'created_at' => [
                'type' => 'datetime',
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_tempat', true);
        $this->forge->createTable("table_profil_tempat");
    }

    public function down()
    {
        $this->forge->dropTable("table_profil_tempat");
    }
}
