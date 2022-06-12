<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

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

        return view('pages/ListProduk', ['products' => $dataProduct]);
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
        return view('pages/TambahProduk');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //Menambah Produk Hukum Baru
        $dataProduct = $this->request->getPost();
        $this->model->insert($dataProduct);

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
        //Untuk Update
        $dataProduct = $this->request->getPost();
        $this->model->where('id', $id)->set($dataProduct)->update();

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
}
