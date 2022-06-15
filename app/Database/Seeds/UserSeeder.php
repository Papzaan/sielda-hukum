<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'SEKRETARIAT DAERAH',
                'username' => 'sekda',
                'password' => '202cb962ac59075b964b07152d234b70',
                'id_opd' => 2,
                'status' => 'user'
            ],
            [
                'name' => 'BAGIAN HUKUM',
                'username' => 'hukum',
                'password' => '202cb962ac59075b964b07152d234b70',
                'id_opd' => 3,
                'status' => 'admin'
            ],
            [
                'name' => 'DINAS KOMUNIKASI DAN INFORMATIKA',
                'username' => 'hukum',
                'password' => '202cb962ac59075b964b07152d234b70',
                'id_opd' => 18,
                'status' => 'user'
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
