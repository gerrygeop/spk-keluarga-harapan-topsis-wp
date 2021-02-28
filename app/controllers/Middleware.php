<?php

class Middleware extends Controller {

    public function index()
    {
        $data['judul'] = '401';

        $this->view('templates/header', $data);
        $this->view('templates/401');
        $this->view('templates/footer');
    }

    public function checkout()
    {
        $data['judul'] = '202';

        $this->view('templates/header', $data);
        $this->view('templates/202');
        $this->view('templates/footer');
    }

}