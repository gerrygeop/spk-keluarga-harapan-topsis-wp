<?php

class Perbandingan extends Controller {

    public function index()
    {
        $data['alt'] = $bobot['alt'] = $this->model('AlternatifModel')->getAllAlternatif();
        $bobot['sub'] = $this->model('KriteriaModel')->getSubKriteria();
        $bobot['nilai'] = $this->model('KriteriaModel')->getIdKriteria();

        $data['tp'] = $this->model('PerbandinganModel')->hitungTP($bobot);
        $data['wp'] = $this->model('PerbandinganModel')->hitungWP($bobot);
        $data['judul'] = 'Perbandingan dan Perhitungan Metode';
        
        $this->view('templates/header', $data);
        $this->view('perbandingan/index', $data);
        $this->view('templates/footer');
    }

    public function topsis()
    {
        $data['alt'] = $bobot['alt'] = $this->model('AlternatifModel')->getAllAlternatif();
        $bobot['sub'] = $this->model('KriteriaModel')->getSubKriteria();
        $bobot['nilai'] = $this->model('KriteriaModel')->getIdKriteria();

        $data['tp'] = $this->model('PerbandinganModel')->hitungTP($bobot);
        // $data['wp'] = $this->model('PerbandinganModel')->hitungWP($bobot);
        $data['judul'] = 'Detail TOPSIS';
        
        $this->view('templates/header', $data);
        $this->view('perbandingan/topsis', $data);
        $this->view('templates/footer');
    }

    public function wp()
    {
        $data['alt'] = $bobot['alt'] = $this->model('AlternatifModel')->getAllAlternatif();
        $bobot['sub'] = $this->model('KriteriaModel')->getSubKriteria();
        $bobot['nilai'] = $this->model('KriteriaModel')->getIdKriteria();

        // $data['tp'] = $this->model('PerbandinganModel')->hitungTP($bobot);
        $data['wp'] = $this->model('PerbandinganModel')->hitungWP($bobot);
        $data['judul'] = 'Detail WP';
        
        $this->view('templates/header', $data);
        $this->view('perbandingan/wp', $data);
        $this->view('templates/footer');
    }

}