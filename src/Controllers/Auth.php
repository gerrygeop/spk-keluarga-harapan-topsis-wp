<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Flasher;

class Auth extends Controller {
    public function index()
    {
        $data['judul'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('auth/login');
        $this->view('templates/footer');
    }

    public function register()
    {
        $data['judul'] = 'Register';
        $this->view('templates/header', $data);
        $this->view('auth/register');
        $this->view('templates/footer');
    }

    public function registerStore()
    {
        if (empty($_POST['username']) && empty($_POST['password'])) {
            Flasher::setFlash('Username dan Password tidak boleh', 'Kosong', 'danger');
            header('Location: '. BASEURL .'/auth/register');
            exit;
        }

        $validation = "/^[a-zA-Z]*$/";
        if (!preg_match($validation, $_POST['username'])) {
            Flasher::setFlash('Username tidak bisa menggunakan', 'angka', 'danger');
            header('Location: ' . BASEURL . '/auth/register');
            exit;
        }

        $_POST['username'] = htmlspecialchars($_POST['username']);
        // Store password hash in Model? Or here? 
        // Best practice: Hash in Model or Service. But following old pattern for speed, hash here.
        // Original code hashed here.
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        if ($this->model('UserModel')->register($_POST) > 0) {
            Flasher::setFlash('Register', 'Berhasil Silahkan Login', 'success');
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            Flasher::setFlash('Register', 'Gagal', 'danger');
            header('Location: '. BASEURL .'/auth/register');
            exit;
        }
    }

    public function login()
    {
        if (empty($_POST['username']) && empty($_POST['password'])) {
            Flasher::setFlash('Username dan Password tidak boleh', 'Kosong', 'danger');
            header('Location: '. BASEURL .'/auth');
        } else {
            $loginUser = $this->model('UserModel')->loginUser($_POST['username'], $_POST['password']);
            
            if (!$loginUser) {
                Flasher::setFlash('Username atau Password', 'Salah', 'danger');
                header('Location: '. BASEURL .'/auth');
                exit;
            } else {
                $_SESSION['user_id'] = $loginUser['id'];
                $_SESSION['username'] = $loginUser['username'];
                Flasher::setFlash('Login', 'Berhasil', 'primary');
                header('Location: '. BASEURL .'/home');
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        session_destroy();
        header('Location: '. BASEURL .'/auth');
    }
}
