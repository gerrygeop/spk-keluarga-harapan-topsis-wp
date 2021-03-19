<?php

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
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($this->model('UserModel')->register($_POST) > 0) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            die('Kayaknye ada yang salah');
        }
    }

    public function login()
    {
        if (empty($_POST['username']) && empty($_POST['password'])) {
            die('Isi Username dan Password');
        } else {
            $loginUser = $this->model('UserModel')->loginUser($_POST['username'], $_POST['password']);
            // die(var_dump($loginUser));

            if (is_null($loginUser)) {
                die('Gagal Login');
            } else {
                $this->createUserSession($loginUser);
            }
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: '. BASEURL .'/home');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION);
        header('Location: '. BASEURL .'/auth');
    }
}