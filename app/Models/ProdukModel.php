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
    protected $allowedFields        = ["nota_dinas", "no_usulan", 'judul', 'jenis', 'tgl_surat', 'tgl_input', 'perihal_nota', 'isi_nota', 'usulan_produk', 'penanggung_jawab', 'no_wa', 'id_opd', 'status'];

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

    public function getProdukHukum()
    {
        $session = session();
        $id_opd = $session->get('id_opd');
        $query =  $this->db->table('tb_produk')
            ->join('opd', 'tb_produk.id_opd = opd.id_opd')
            ->where('tb_produk.id_opd', ['id_opd' => $id_opd])
            ->get();
        return $query;
    }

    public function getKotakMasukHukum()
    {
        $session = session();
        $id_user = $session->get('id_user');
        $query =  $this->db->table('tb_produk')
            ->join('route', 'tb_produk.id = route.id_surat')
            ->join('opd', 'opd.id_opd = tb_produk.id_opd')
            // ->where('route.id_user', ['id_user' => $id_user])
            ->select('opd.nama_opd, tb_produk.id ,tb_produk.no_usulan, tb_produk.judul, tb_produk.jenis, tb_produk.tgl_surat, tb_produk.tgl_input, tb_produk.perihal_nota, tb_produk.isi_nota, tb_produk.usulan_produk, tb_produk.penanggung_jawab, tb_produk.no_wa, tb_produk.status, tb_produk.nota_dinas')
            ->get();
        return $query;
    }

    public function getKotakMasuk()
    {
        $session = session();
        $id_user = $session->get('id_user');
        $query =  $this->db->table('tb_produk')
            ->join('route', 'tb_produk.id = route.id_surat')
            ->join('opd', 'opd.id_opd = tb_produk.id_opd')
            ->where('route.id_user', ['id_user' => $id_user])
            ->select('opd.nama_opd, tb_produk.id ,tb_produk.no_usulan, tb_produk.judul, tb_produk.jenis, tb_produk.tgl_surat, tb_produk.tgl_input, tb_produk.perihal_nota, tb_produk.isi_nota, tb_produk.usulan_produk, tb_produk.penanggung_jawab, tb_produk.no_wa, tb_produk.status, tb_produk.nota_dinas')
            ->get();
        return $query;
    }

    public function getProdukAdmin()
    {
        $session = session();
        $id_opd = $session->get('id_opd');
        $query =  $this->db->table('tb_produk')
            ->join('opd', 'tb_produk.id_opd = opd.id_opd')
            ->get();
        return $query;
    }
}
