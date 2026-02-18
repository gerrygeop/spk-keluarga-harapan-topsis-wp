<?php

namespace App\Controllers;

use App\Core\Controller;

class Middleware extends Controller {

    public function index()
    {
        $data['judul'] = '401';

        $this->view('templates/header', $data);
        $this->view('templates/401');
        $this->view('templates/footer');
    }
}
