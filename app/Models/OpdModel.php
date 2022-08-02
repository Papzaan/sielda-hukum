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
        $session = session();
        $id_opd = $session->get('id_opd');
        return $this->db->table('opd')
            ->where('id_opd', ['id_opd' => $id_opd])
            ->get()->getResultArray();
    }
}
