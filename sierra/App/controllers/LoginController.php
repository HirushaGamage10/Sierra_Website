<?php

class LoginController extends Controller {

    public function index() {
        $data['page_title'] = "Login";
        $this->view("User/LoginPage", $data);
    }

    // Function to login user and admin
    public function login() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
       
        if (isset($_POST['submit'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $loginModel = $this->model('LoginModel');
            $user = $loginModel->login($email, $password);
    
            
            if ($user) {
                $_SESSION['id'] = $user->id; 
                $_SESSION['name'] = $user->name;  
                $_SESSION['email'] = $user->email;  
                $_SESSION['role'] = $user->role; 
    
                
                if ($_SESSION['role'] == 'admin') {
                    header("Location: " . BASE_URL . "/dashboard");
                } elseif ($_SESSION['role'] == 'user') {
                    header("Location: " . BASE_URL . "/home");
                }
                exit(); 
            } else {
                $data['error_message'] = "Incorrect email or password!";
                $this->view("User/LoginPage", $data);
            }
        } else {
            $this->index();
        }
    }

    // Function to logout user and admin
    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();

        header("Location: " . BASE_URL . "/login");
        exit(); 
    }
}
