<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableDataDiri extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_data_diri' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsignned' => true,
                'auto_increment' => true,
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
            'tanda_pengenal' =>
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
        $this->forge->addKey('id_data_diri', true);
        $this->forge->createTable(table: "table_data_diri");
    }

    public function down()
    {
        $this->forge->dropTable(table: "table_data_diri");
    }
}
