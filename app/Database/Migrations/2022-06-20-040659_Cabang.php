<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cabang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '4',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null' => true,
            ],
            'created_at' => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'updated_at' => [
                'type'       => 'DATE',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('cabang');
    }

    public function down()
    {
        $this->forge->dropTable('cabang');
    }
}
