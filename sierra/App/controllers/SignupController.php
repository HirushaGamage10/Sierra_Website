<?php

class SignupController extends Controller
{
    public function index()
    {

        $data['page_title'] = "Sign Up";
        $this->view("User/SignupPage", $data);
    }

    public function register()
    {

        if (isset($_POST['submit'])) {
            
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $cpassword = trim($_POST['cpassword']);

            
           if (empty($errors)) {


                if (empty($name)) {
                    $errors['name'] = "Name is required";
                }

                if (empty($email)) {
                    $errors['email'] = "Email is required";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Email is invalid";
                }

                if (empty($password)) {
                    $errors['password'] = "Password is required";
                } elseif (strlen($password) < 6) {
                    $errors['password'] = "Password must be at least 6 characters";
                }

                if (empty($cpassword)) {
                    $errors['cpassword'] = "Confirm Password is required";
                } elseif ($password !== $cpassword) {
                    $errors['cpassword'] = "Passwords do not match";
                }

                if ($email_exists) {
                    $errors['email'] = "Email already exists";
                }


               
                $register = $this->model('LoginModel')->register($name, $email, $password , $role = 'user');

                if ($register) {
                    header("Location: " . BASE_URL . "/login");
                    exit();
                } else {
                   
                    $data['error_message'] = "Registration failed. Please try again.";
                    $this->view("User/SignupPage", $data);
                }
            } else {

                $data['errors'] = $errors;
                $this->view("User/SignupPage", $data);
            }
        } else {
            $this->index();
        }
    }
}
