<?php

class Alternatif extends Controller {

    public function index()
    {
        $data['judul'] = 'Tabel data Calon Penerima';
        $data['alt'] = $this->model('AlternatifModel')->getAllAlternatif();
        $data['sub'] = $this->model('KriteriaModel')->getAllSubKriteria();

        $this->view('templates/header', $data);
        $this->view('alternatif/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah data calon penerima';

        for ($i=1; $i <= 11; $i++) { 
            $data['c'.$i] = $this->model('KriteriaModel')->getSubKriteriaById($i);
        }
        
        $this->view('templates/header', $data);
        $this->view('alternatif/create', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        if ($this->model('AlternatifModel')->tambahAlternatif($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/alternatif');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/alternatif');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit data';
        $data['alt'] = $this->model('AlternatifModel')->getAlternatifById($id);

        for ($i=1; $i <= 11; $i++) { 
            $data['c'.$i] = $this->model('KriteriaModel')->getSubKriteriaById($i);
        }

        $this->view('templates/header', $data);
        $this->view('alternatif/edit', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if ($this->model('AlternatifModel')->updateAlternatif($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Diedit', 'success');
            header('Location: ' . BASEURL . '/alternatif');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diedit', 'danger');
            header('Location: ' . BASEURL . '/alternatif');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('AlternatifModel')->hapusAlternatif($id) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/alternatif');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/alternatif');
            exit;
        }
    }
}