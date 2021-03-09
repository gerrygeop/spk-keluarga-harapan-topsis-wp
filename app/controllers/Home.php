<?php

class Home extends Controller {

    public function index()
    {
        $data['judul'] = 'Home';

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function about()
    {
        $data['judul'] = 'Keterangan';
        // $data['kriteria'] = $this->model('KriteriaModel')->getAllKriteria();

        $this->view('templates/header', $data);
        $this->view('home/about');
        $this->view('templates/footer');
    }

}