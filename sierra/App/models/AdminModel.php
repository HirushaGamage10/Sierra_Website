<?php

class AdminModel
{
    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }


    public function getAdmins() {
        $query = "SELECT * FROM users WHERE role = 'admin'";
        $this->db->query($query);
        return $this->db->resultSet();
    }


    // Add a new admin
    public function addAdmin($name, $email, $password, $role = 'admin') {
        try {
            $this->db->query("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");
            $this->db->bind(':name', $name);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', password_hash($password, PASSWORD_DEFAULT)); 
            $this->db->bind(':role', $role);
            return $this->db->execute();
        } catch (Exception $e) {
            error_log("Registration error: " . $e->getMessage());
            return false;
        }
    }

    // Delete an admin
    public function deleteAdmin($id) {
        $this->db->query("DELETE FROM users WHERE id = :id AND role = 'admin'");
        $this->db->bind(':id', $id);
        $this->db->execute(); 
        
    }

    // Update  admin
    public function updateAdmin($id, $name, $email, $password, $role = 'admin') {
        try {
            $this->db->query("UPDATE users SET name = :name, email = :email, password = :password, role = :role WHERE id = :id");
            $this->db->bind(':id', $id);
            $this->db->bind(':name', $name);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', password_hash($password, PASSWORD_DEFAULT));
            $this->db->bind(':role', $role);
            return $this->db->execute();
        } catch (Exception $e) {
            error_log("Update error: " . $e->getMessage());
            return false;
        }

    }

    public function updateAdmindetails($id) {
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }




}