<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Flasher;

class Alternatif extends Controller {

    public function index()
    {
        $data['judul'] = 'Daftar Penerima';
        $data['alt'] = $this->model('AlternatifModel')->getAllAlternatif();
        $data['sub'] = $this->model('KriteriaModel')->getAllSubKriteria();

        $this->view('templates/header', $data);
        $this->view('alternatif/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah Penerima';
        
        // Populate c1..c11 for the view
        // Ideally loop based on getAllKriteria counts, but for now fixed to 11 to match View.
        // We could make this dynamic: foreach (getAllKriteria as k) $data['c'.k.id] = ...
        
        $kriteriaModel = $this->model('KriteriaModel');
        // Assuming IDs are 1..11
        for ($i=1; $i <= 11; $i++) { 
            $data['c'.$i] = $kriteriaModel->getSubKriteriaById($i);
        }

        $this->view('templates/header', $data);
        $this->view('alternatif/create', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $validation = "/^[a-zA-Z]*$/";
        if (!preg_match($validation, $_POST['nama'])) {
            Flasher::setFlash('Nama tidak boleh menggunakan', 'angka', 'danger');
            header('Location: ' . BASEURL . '/alternatif/create');
            exit;
        }

        $_POST['nama'] = htmlspecialchars($_POST['nama']);
        
        if ($this->model('AlternatifModel')->tambahAlternatif($_POST) > 0) {
            Flasher::setFlash('Data Alternatif Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/alternatif');
            exit;
        } else {
            Flasher::setFlash('Data Alternatif Gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/alternatif');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Alternatif';
        $data['alt'] = $this->model('AlternatifModel')->getAlternatifById($id);
        
        $kriteriaModel = $this->model('KriteriaModel');
        for ($i=1; $i <= 11; $i++) { 
            $data['c'.$i] = $kriteriaModel->getSubKriteriaById($i);
        }
        
        $this->view('templates/header', $data);
        $this->view('alternatif/edit', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        $_POST['nama'] = htmlspecialchars($_POST['nama']);
        
        if ($this->model('AlternatifModel')->updateAlternatif($_POST) > 0) {
            Flasher::setFlash('Data Alternatif Berhasil', 'Diedit', 'success');
            header('Location: ' . BASEURL . '/alternatif');
            exit;
        } else {
            Flasher::setFlash('Data Alternatif Gagal', 'Diedit', 'danger');
            header('Location: ' . BASEURL . '/alternatif');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('AlternatifModel')->hapusAlternatif($id) > 0) {
            Flasher::setFlash('Data Alternatif Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/alternatif');
            exit;
        } else {
            Flasher::setFlash('Data Alternatif Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/alternatif');
            exit;
        }
    }
}
