<?php

class Kriteria extends Controller {

    public function index()
    {
        $data['judul'] = 'Tabel Kriteria';
        $data['alt'] = $this->model('AlternatifModel')->getAllAlternatif();
        $data['ktr'] = $this->model('KriteriaModel')->getAllKriteria();
        $data['sub'] = $this->model('KriteriaModel')->getAllBobotSub();

        $this->view('templates/header', $data);
        $this->view('kriteria/index', $data);
        $this->view('templates/footer');
    }

}