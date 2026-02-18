<?php

namespace App\Controllers;

use App\Core\Controller;

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('UserModel')->getUser(); // Assuming getUser exists or we create it
        
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function help()
    {
        $data['judul'] = 'Help';
        
        $kriteriaModel = $this->model('KriteriaModel');
        for ($i=1; $i <= 11; $i++) { 
             $data['c'.$i] = $kriteriaModel->getSubKriteriaById($i);
        }

        $this->view('templates/header', $data);
        $this->view('home/help', $data);
        $this->view('templates/footer');
    }
}
