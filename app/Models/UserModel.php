<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id_user";
    protected $allowedFields = ["nip", "password", "nama", "status"];
    protected $useTimestamps = false;
}
