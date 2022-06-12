<?php

namespace App\Controllers;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/pages/login');
        }

        //cek role dari session
        if ($this->session->get('status') != 'admin') {
            return redirect()->to('/user');
        }

        return view('pages/index');
    }
}
