<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\TopsisService;
use App\Services\WpService;

class Perhitungan extends Controller {

    public function index()
    {
        $alternatifModel = $this->model('AlternatifModel');
        $kriteriaModel = $this->model('KriteriaModel');

        $alternatives = $alternatifModel->getAllAlternatif();
        $subCriteria = $kriteriaModel->getAllSubKriteria();
        $criteriaWeights = $kriteriaModel->getNilaiKriteria();
        // $bobotSub = $kriteriaModel->getAllBobotSub(); // For WP?

        $topsisService = new TopsisService();
        $wpService = new WpService();

        $data['alt'] = $alternatives;
        $data['tp'] = $topsisService->calculate($alternatives, $criteriaWeights, $subCriteria);
        $data['wp'] = $wpService->calculate($alternatives, $criteriaWeights, $subCriteria);
        
        $data['judul'] = 'Perhitungan';
        
        $this->view('templates/header', $data);
        $this->view('perhitungan/index', $data);
        $this->view('templates/footer');
    }

    public function topsis()
    {
        $alternatifModel = $this->model('AlternatifModel');
        $kriteriaModel = $this->model('KriteriaModel');

        $alternatives = $alternatifModel->getAllAlternatif();
        $subCriteria = $kriteriaModel->getAllSubKriteria();
        $criteriaWeights = $kriteriaModel->getNilaiKriteria();

        $topsisService = new TopsisService();
        $data['tp'] = $topsisService->calculate($alternatives, $criteriaWeights, $subCriteria);
        $data['alt'] = $alternatives; // For reference
        
        $data['judul'] = 'Detail TOPSIS';
        
        $this->view('templates/header', $data);
        $this->view('perhitungan/topsis', $data);
        $this->view('templates/footer');
    }

    public function wp()
    {
        $alternatifModel = $this->model('AlternatifModel');
        $kriteriaModel = $this->model('KriteriaModel');

        $alternatives = $alternatifModel->getAllAlternatif();
        $subCriteria = $kriteriaModel->getAllSubKriteria();
        $criteriaWeights = $kriteriaModel->getNilaiKriteria();

        $wpService = new WpService();
        $data['wp'] = $wpService->calculate($alternatives, $criteriaWeights, $subCriteria);
        $data['alt'] = $alternatives;

        $data['judul'] = 'Detail WP';
        
        $this->view('templates/header', $data);
        $this->view('perhitungan/wp', $data);
        $this->view('templates/footer');
    }
}
