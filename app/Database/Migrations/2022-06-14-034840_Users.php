<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_opd' => [
                'type' => 'INT',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],

        ]);

        $this->forge->addPrimaryKey('id_user');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
