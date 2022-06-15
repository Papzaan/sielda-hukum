<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbProduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'opd' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'no_usulan' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 55,
            ],
            'tgl_surat' => [
                'type' => 'DATE',
            ],
            'tgl_input' => [
                'type' => 'DATE',
            ],
            'perihal_nota' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'isi_nota' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'usulan_produk' => [
                'type' => 'VARCHAR',
                'constraint' => 55,
            ],
            'penanggung_jawab' => [
                'type' => 'VARCHAR',
                'constraint' => 55,
            ],
            'no_wa' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'id_opd' => [
                'type' => 'int',
                'constraint' => 25,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tb_Produk');
    }

    public function down()
    {
        $this->forge->dropTable('tb_Produk');
    }
}
