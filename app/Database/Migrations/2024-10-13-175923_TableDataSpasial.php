<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableDataSpasial extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_data_spasial' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsignned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'int',
                'constraint' => 5,
            ],
            'lat' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'long' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'ketinggian' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'kelembaban' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'kecepatan_angin' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'luas_tempat' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'tekanan_udara' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'datetime',
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_data_spasial', true);
        $this->forge->createTable(table: "table_data_spasial");
    }

    public function down()
    {
        $this->forge->dropTable(table: "table_data_spasial");
    }
}
