<?php

class Perhitungan extends Controller {

    public function index()
    {
        $data['alt'] = $bobot['alt'] = $this->model('AlternatifModel')->getAllAlternatif();
        $bobot['sub'] = $this->model('KriteriaModel')->getAllSubKriteria();
        $bobot['nilai'] = $this->model('KriteriaModel')->getNilaiKriteria();

        $data['tp'] = $this->model('PerhitunganModel')->hitungTP($bobot);
        $data['wp'] = $this->model('PerhitunganModel')->hitungWP($bobot);
        $data['judul'] = 'Perhitungan';
        
        $this->view('templates/header', $data);
        $this->view('perhitungan/index', $data);
        $this->view('templates/footer');
    }

    public function topsis()
    {
        $data['alt'] = $bobot['alt'] = $this->model('AlternatifModel')->getAllAlternatif();
        $bobot['sub'] = $this->model('KriteriaModel')->getAllSubKriteria();
        $bobot['nilai'] = $this->model('KriteriaModel')->getNilaiKriteria();

        $data['tp'] = $this->model('PerhitunganModel')->hitungTP($bobot);
        $data['judul'] = 'Detail TOPSIS';
        
        $this->view('templates/header', $data);
        $this->view('perhitungan/topsis', $data);
        $this->view('templates/footer');
    }

    public function wp()
    {
        $data['alt'] = $bobot['alt'] = $this->model('AlternatifModel')->getAllAlternatif();
        $bobot['sub'] = $this->model('KriteriaModel')->getAllBobotSub();

        $bobot['nilai'] = $this->model('KriteriaModel')->getNilaiKriteria();

        $data['wp'] = $this->model('PerhitunganModel')->hitungWP($bobot);
        $data['judul'] = 'Detail WP';
        
        $this->view('templates/header', $data);
        $this->view('perhitungan/wp', $data);
        $this->view('templates/footer');
    }

}