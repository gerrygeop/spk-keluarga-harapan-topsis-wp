<?php

namespace App\Models;

use App\Core\Database;

class UserModel {

    private $table = 'admin';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $query = "INSERT INTO ". $this->table ." (username, password) VALUES (:username, :password)";
        $this->db->query($query);

        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function loginUser($username, $password)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE username=:username');
        $this->db->bind('username', $username);

        $row = $this->db->single();
        
        if (!$row) return false;

        $hashPassword = $row['password'];

        if (password_verify($password, $hashPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    public function getUser()
    {
        if (isset($_SESSION['user_id'])) {
             $this->db->query('SELECT * FROM '. $this->table .' WHERE id=:id');
             $this->db->bind('id', $_SESSION['user_id']);
             return $this->db->single();
        }
        return null;
    }
}
