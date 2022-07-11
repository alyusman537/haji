<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jamaah extends Migration
{
    public function up()
    //NO	NO.SERTIFIKAT	TANGGAL	BULAN	TAHUN	KANTOR	NAMA	TEMPAT LAHIR	TANGGAL LAHIR	ALAMAT	link_foto	REK BMT	 PLAFOND 	SPH	BPIH	REK BANK	KET	TELEEPON	pembatalan	tgl_pembatalan	status

    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nomorSertifikat' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggalDaftar' => [
                'type'       => 'DATETIME',
            ],
            'kantor' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tempatLahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'tanggalLahir' => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'alamat' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'null' => true,
            ],
            'linkFoto' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null' => true,
            ],
            'rekeningBmt' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'rekeningBank' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'keterangan' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'tanggalPembatalan' => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'keteranganPembatalan' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'default' => 'Aktif',
            ],
            'created_at' => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'updated_at' => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'deleted_at' => [
                'type'       => 'DATE',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jamaah');
    }

    public function down()
    {
        $this->forge->dropTable('jamaah');
    }
}
