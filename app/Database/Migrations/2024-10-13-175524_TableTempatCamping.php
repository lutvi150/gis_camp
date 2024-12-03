<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableTempatCamping extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tempat_camping' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsignned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'int',
                'constraint' => 5,
            ],
            'nama_tempat_camping' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'nomor_hp' => [
                'type' => 'varchar',
                'constraint' => 15,
            ],
            'alamat' => [
                'type' => 'text',
                'constraint' => 255,
            ],
            'provinsi' => [
                'type' => 'varchar',
                'constraint' => 5,
            ],
            'kabupaten' => [
                'type' => 'varchar',
                'constraint' => 5,
            ],
            'kecamatan' => [
                'type' => 'varchar',
                'constraint' => 5,
            ],
            'desa' => [
                'type' => 'varchar',
                'constraint' => 5,
            ],
            'foto_tempat' =>
            [
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
        $this->forge->addKey('id_tempat_camping', true);
        $this->forge->createTable(table: "table_tempat_camping");
    }

    public function down()
    {
        $this->forge->dropTable(table: "table_tempat_camping");
    }
}
