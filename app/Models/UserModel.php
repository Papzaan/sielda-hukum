<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id_user";
    protected $allowedFields = ["opd", "username", "password", "name", "status"];
    protected $useTimestamps = false;

    public function getdataUser()
    {
        $session = session();
        $id_user = $session->get('id_user');
        return $this->db->table('users')
            ->where('id_user', ['id_user' => $id_user])
            ->get()->getResultArray();
    }
}
