<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableProduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsignned' => true,
                'auto_increment' => true,
            ],
            'nama_produk' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'jenis' => [
                'type' => 'text',
            ],
            'harga' => [
                'type' => 'int',
                'constraint' => 20,
            ],
            'deskripsi' => [
                'type' => 'text',
            ],
            'id_foto' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'id_user' => [
                'type' => 'int',
                'constraint' => 11
            ],
            'terjual' => [
                'type' => 'int',
                'constraint' => 11
            ],
            'created_at' => [
                'type' => 'datetime',
            ],
            'updated_at' => [
                'type' => 'datetime',
            ]
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable(table: "table_produk");
    }

    public function down()
    {
        $this->forge->dropTable("table_produk");
    }
}
