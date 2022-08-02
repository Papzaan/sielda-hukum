<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use TCPDF;

class Home extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->model = new \App\Models\ProdukModel();
        $this->modelRoute = new \App\Models\RouteModel();
        $this->modelUser = new \App\Models\UserModel();
    }
    public function index()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }

        //cek role dari session
        if ($this->session->get('status') != 'admin') {
            return redirect()->to('/user');
        }

        return view('pages/index');
    }

    public function Tambah()
    {
        return view('pages/TambahProduk');
    }
    public function EditProduk()
    {
        return view('pages/EditProduk');
    }
    public function ListProduk()
    {
        return view('pages/ListProduk');
    }
    public function Profile()
    {
        $dataUser = $this->modelUser->getdataUser();
        return view('pages/Profile', ['user' => $dataUser]);
    }

    public function kotakmasuk()
    {
        $dataProduct =  $this->model->getKotakMasukHukum()->getResult();
        return view('pages/KotakMasuk', ['produk' => $dataProduct]);
    }

    public function create()
    {
        if (!$this->validate([
            'id_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('home/KotakMasuk')->withInput();
        }

        $dataProduct = $this->request->getPost();
        $this->modelRoute->insert($dataProduct);
        return redirect()->to('home/KotakMasuk');
    }

    function CetakKodeSurat()
    {
        $id = $this->request->uri->getSegment(3);
        $berkas = new ProdukModel();
        $data = $berkas->find($id);

        $html = view('pages/KodeSurat', [
            'data' => $data,
        ]);

        $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dea Venditama');
        $pdf->SetTitle('Invoice');
        $pdf->SetSubject('Invoice');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('invoice.pdf', 'I');
    }
}
