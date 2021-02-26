<?php

class Perbandingan extends Controller {

    public function index()
    {
        $bobot['alt'] = $this->model('AlternatifModel')->getAllAlternatif();
        $bobot['sub'] = $this->model('KriteriaModel')->getSubKriteria();
        $bobot['nilai'] = $this->model('KriteriaModel')->getIdKriteria();

        $data['tp'] = $this->model('PerbandinganModel')->hitungTP($bobot);
        $data['wp'] = $this->model('PerbandinganModel')->hitungWP($bobot);
        $data['judul'] = 'Perbandingan dan Perhitungan Metode';
        
        $this->view('templates/header', $data);
        $this->view('perbandingan/index', $data);
        $this->view('templates/footer');
    }

}