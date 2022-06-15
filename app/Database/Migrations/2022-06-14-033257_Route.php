<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Route extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_route' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
            ],
            'id_surat' => [
                'type' => 'INT',
            ],
            'status' => [
                'type' => 'INT',
            ],

        ]);

        $this->forge->addPrimaryKey('id_route');
        $this->forge->createTable('route');
    }

    public function down()
    {
        $this->forge->dropTable('route');
    }
}
