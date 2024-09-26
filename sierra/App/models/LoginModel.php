<?php

class LoginModel {

    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }

    public function register($name, $email, $password, $role = 'user') {
        try {
            $this->db->query("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");


            $this->db->bind(':name', $name);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', password_hash($password, PASSWORD_DEFAULT)); // Hash password
            $this->db->bind(':role', $role);

            return $this->db->execute();
        } catch (Exception $e) {
            error_log("Registration error: " . $e->getMessage());
            return false;
        }
    }

    public function login($email, $password) {
        try {
            $this->db->query("SELECT * FROM users WHERE email = :email");
            $this->db->bind(':email', $email);

            $user = $this->db->single();

            if ($this->db->rowCount() > 0) {
                if (password_verify($password, $user->password)) {
                    return $user;
                }
            }

            
            return false;
        } catch (Exception $e) {
            error_log("Login error: " . $e->getMessage());
            return false;
        }
    }
}
