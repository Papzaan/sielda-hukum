<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Opd extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_opd' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_opd' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

        ]);

        $this->forge->addPrimaryKey('id_opd');
        $this->forge->createTable('opd');
    }

    public function down()
    {
        $this->forge->dropTable('opd');
    }
}
