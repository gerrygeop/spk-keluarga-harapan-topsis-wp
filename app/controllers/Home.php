<?php

class Home extends Controller {

    public function index()
    {
        $data['judul'] = 'Home';

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function help()
    {
        $data['judul'] = 'Help';

        for ($i=1; $i <= 11; $i++) { 
            $data['c'.$i] = $this->model('KriteriaModel')->getSubKriteriaById($i);
        }

        $this->view('templates/header', $data);
        $this->view('home/help', $data);
        $this->view('templates/footer');
    }

}