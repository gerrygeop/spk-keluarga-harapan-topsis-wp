<?php

namespace App\Controllers;

use App\Core\Controller;

class Kriteria extends Controller {

    public function index()
    {
        $data['judul'] = 'Tabel Kriteria';
        $data['alt'] = $this->model('AlternatifModel')->getAllAlternatif();
        $data['ktr'] = $this->model('KriteriaModel')->getAllKriteria();
        $data['sub'] = $this->model('KriteriaModel')->getAllBobotSub(); // Original used this? "getAllBobotSub"? 
        // Original: $data['sub'] = $this->model('KriteriaModel')->getAllBobotSub();
        // Check KriteriaModel if it has nama_sub in getAllBobotSub? 
        // getAllBobotSub returns id_sub, bobot_sub. View kriteria/index might need checks.
        
        $this->view('templates/header', $data);
        $this->view('kriteria/index', $data);
        $this->view('templates/footer');
    }

}
