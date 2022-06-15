<?php

namespace App\Models;

use CodeIgniter\Model;

class OpdModel extends Model
{
    protected $table = "opd";
    //protected $primaryKey = "nik_customer";
    protected $allowedFields = ["opd"];
    protected $useTimestamps = false;


    public function getdataOpd()
    {
        return $this->db->table('opd')
            ->get()->getResultArray();
    }
}
