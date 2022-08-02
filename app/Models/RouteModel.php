<?php

namespace App\Models;

use CodeIgniter\Model;

class RouteModel extends Model
{
    protected $table = "route";
    protected $primaryKey = "id_route";
    protected $allowedFields = ["id_user", "id_surat", "status"];
    protected $useTimestamps = false;


    public function getdataOpd()
    {
        return $this->db->table('opd')
            ->get()->getResultArray();
    }
}
