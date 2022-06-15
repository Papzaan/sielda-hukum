<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_produk';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ["opd", "no_usulan", 'judul', 'jenis', 'tgl_surat', 'tgl_input', 'perihal_nota', 'isi_nota', 'usulan_produk', 'penanggung_jawab', 'no_wa', 'status'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function getProduk($id_opd = false)
    {
        if ($id_opd = false) {
            return $this->findAll();
        }

        return $this->where(['id_opd' => $id_opd])->first();
    }
}
