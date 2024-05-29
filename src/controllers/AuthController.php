<?php
// src/controllers/AuthController.php

namespace Controllers;


use Controllers\ResultController;

use Models\User;



class AuthController extends ResultController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];

            $loggedInUser = $user->login();
            if ($loggedInUser) {
                session_start();
                $_SESSION['user_id'] = $loggedInUser['id'];
                $_SESSION['username'] = $loggedInUser['username'];
                header("Location: /dashboard");
            } else {
                $this->view('login', ['error' => 'Invalid login credentials']);
            }
        } else {
            $this->view('login');
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];

            if ($user->register()) {
                header("Location: /login");
            } else {
                $this->view('register', ['error' => 'Registration failed']);
            }
        } else {
            $this->view('register');
        }
    }
}
?>


