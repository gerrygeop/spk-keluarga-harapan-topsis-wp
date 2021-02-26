<?php

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
        // die(var_dump($row));
        $hashPassword = $row['password'];

        if (password_verify($password, $hashPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    public function findUserByUsername($username)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE username=:username');
        $this->db->bind('username', $username);

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}