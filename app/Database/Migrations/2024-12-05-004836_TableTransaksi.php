<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableTransaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsignned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'total_harga' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'status_transaksi' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'nomor_transaksi' =>
            [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'created_at' => [
                'type' => 'datetime',
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_transaksi', true);
        $this->forge->createTable("table_transaksi");
    }

    public function down()
    {
        $this->forge->dropTable("table_transaksi");
    }
}
