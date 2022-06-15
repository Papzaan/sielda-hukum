<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\OpdModel;
use App\Models\ProdukModel;

class Produk extends ResourceController

{
    public function __construct()
    {
        $this->model = new \App\Models\ProdukModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //Halaman List Produk Hukum
        $dataProduct = $this->model->findAll();

        return view('pages/ListProduk', ['produk' => $dataProduct]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //Halaman Tambah Produk Hukum
        $model = new OpdModel();
        $data['opd_nama'] = $model->getdataOpd();
        return view('pages/TambahProduk', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'usulan_produk' => [
                'rules' => 'uploaded[usulan_produk]|mime_in[usulan_produk,application/pdf,application/docx,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/zip,application/msword,application/vnd.ms-office]|max_size[usulan_produk,20480]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa docx,doc',
                    'max_size' => 'Ukuran File Maksimal 20 MB'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('produk/new')->withInput();
        }
        //Tangkap File Docx
        $berkas = $this->request->getFile('usulan_produk');
        //Pindahkan ke Folder Upload/berkas
        $berkas->move('uploads/berkas');
        //ambil nama file
        $namaFile = $berkas->getName();

        //Menambah Produk Hukum Baru
        //$dataProduct = $this->request->getPost();
        $this->model->insert([
            'opd' => $this->request->getVar('opd'),
            'no_usulan' => $this->request->getVar('no_usulan'),
            'judul' => $this->request->getVar('judul'),
            'jenis' => $this->request->getVar('jenis'),
            'tgl_surat' => $this->request->getVar('tgl_surat'),
            'tgl_input' => $this->request->getVar('tgl_input'),
            'perihal_nota' => $this->request->getVar('perihal_nota'),
            'isi_nota' => $this->request->getVar('isi_nota'),
            'usulan_produk' => $namaFile,
            'penanggung_jawab' => $this->request->getVar('penanggung_jawab'),
            'no_wa' => $this->request->getVar('no_wa')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan.');

        return redirect()->to('/produk');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //Mengubah Data Produk Hukum
        $dataProduct = $this->model->where('id', $id)->first();

        return view('/pages/editproduk', ['product' => $dataProduct]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'usulan_produk' => [
                'rules' => 'mime_in[usulan_produk,application/pdf,application/docx,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/zip,application/msword,application/vnd.ms-office]|max_size[usulan_produk,20480]',
                'errors' => [
                    'mime_in' => 'File Extention Harus Berupa docx,doc',
                    'max_size' => 'Ukuran File Maksimal 20 MB'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('produk/' . $id . '/edit')->withInput();
        }
        //Tangkap File Docx
        $berkas = $this->request->getFile('usulan_produk');

        // cek berkas, apakah berkas tetap berkas lama
        if ($berkas->getError() == 4) {
            $namaFile = $this->request->getVar('usulan_produk_lama');
        } else {
            //ambil nama file
            $namaFile = $berkas->getName();
            //pindahkan file
            $berkas->move('uploads/berkas', $namaFile);
            //hapus file lama
            unlink('uploads/berkas/' . $this->request->getVar('usulan_produk_lama'));
        }
        //Untuk Update
        //$dataProduct = $this->request->getPost();
        $this->model->where('id', $id)->set([
            'opd' => $this->request->getVar('opd'),
            'no_usulan' => $this->request->getVar('no_usulan'),
            'judul' => $this->request->getVar('judul'),
            'jenis' => $this->request->getVar('jenis'),
            'tgl_surat' => $this->request->getVar('tgl_surat'),
            'tgl_input' => $this->request->getVar('tgl_input'),
            'perihal_nota' => $this->request->getVar('perihal_nota'),
            'isi_nota' => $this->request->getVar('isi_nota'),
            'usulan_produk' => $namaFile,
            'penanggung_jawab' => $this->request->getVar('penanggung_jawab'),
            'no_wa' => $this->request->getVar('no_wa')
        ])->update();

        session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        return redirect()->to('/produk');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //Menghapus Produk Hukum
        $this->model->delete($id);

        return redirect()->to('/produk');
    }


    function download($id)
    {
        $berkas = new ProdukModel();
        $data = $berkas->find($id);
        return $this->response->download('uploads/berkas/' . $data->usulan_produk, null);
    }
}
