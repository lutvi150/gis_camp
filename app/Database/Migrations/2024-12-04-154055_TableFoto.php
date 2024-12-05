<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableFoto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_foto' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsignned' => true,
                'auto_increment' => true,
            ],
            'jenis' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'foto' => [
                'type' => 'text',
            ],
            'created_at' => [
                'type' => 'datetime',
            ]
        ]);
        $this->forge->addKey('id_foto', true);
        $this->forge->createTable(table: "table_foto");
    }

    public function down()
    {
        $this->forge->dropTable("table_foto");
    }
}
