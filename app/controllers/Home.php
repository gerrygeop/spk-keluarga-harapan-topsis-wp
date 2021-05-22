<?php

class Home extends Controller {

    public function index()
    {
        $data['judul'] = 'Home';

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function help()
    {
        $data['judul'] = 'Help';
        // $data['kriteria'] = $this->model('KriteriaModel')->getAllKriteria();

        $this->view('templates/header', $data);
        $this->view('home/help');
        $this->view('templates/footer');
    }

}