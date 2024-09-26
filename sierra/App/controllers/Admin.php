<?php

class Admin extends Controller {

    public function index() 
    {
        
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the user is logged in
        if (!isset($_SESSION['role'])) {
            header("Location: " . BASE_URL . "/home");
            exit();
        }
        // Check if the user is an admin
        if ($_SESSION['role'] == 'admin') {
            $_SESSION['page_title'] = "Dashboard";
            $this->view('Admin/DashboardPage');
        } else {
            header("Location: " . BASE_URL . "/home");
            exit();
        }
    }


    public function Add() 
    {
       
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        
        if (!isset($_SESSION['role'])) {
            header("Location: " . BASE_URL . "/home");
            exit();
        }

       
        if ($_SESSION['role'] == 'admin') {
            $_SESSION['page_title'] = "Add Product";
            $this->view('Admin/AddProduct');
        } else {
            header("Location: " . BASE_URL . "/home");
            exit();
        }
    }


    public function AdminView()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
            header("Location: " . BASE_URL . "/home");
            exit();
        }

        $_SESSION['page_title'] = "Admin View";
        $adminModel = $this->model('AdminModel');
        $data['admins'] = $adminModel->getAdmins();  
        $this->view('Admin/AdminPage', $data);
    }

    public function addAdmin() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = 'admin';
            $adminModel = $this->model('AdminModel');
            $adminModel->addAdmin($name, $email, $password , $role);
            header("Location: " . BASE_URL . "/ViewAdmin");
            exit();
        }
    }

    
    public function deleteAdmin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         if (isset($_POST['id'])) {
             $id = $_POST['id'];
             $adminModel = $this->model('AdminModel');
             $adminModel->deleteAdmin($id);
             header("Location: " . BASE_URL . "/ViewAdmin");
             exit();
         }   
            
        }
    }

    public function editAdmin() {
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = 'admin';
            $adminModel = $this->model('AdminModel');
            $adminModel->updateAdmin($id, $name, $email, $password, $role);
            header("Location: " . BASE_URL . "/ViewAdmin");
            exit();
        }
    }







}
