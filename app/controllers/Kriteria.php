<?php

class Kriteria extends Controller {

    public function index()
    {
        $data['judul'] = 'Tabel Kriteria';
        $data['alt'] = $this->model('AlternatifModel')->getAllAlternatif();
        $data['sub'] = $this->model('KriteriaModel')->getSubKriteria();

        $this->view('templates/header', $data);
        $this->view('kriteria/index', $data);
        $this->view('templates/footer');
    }

}