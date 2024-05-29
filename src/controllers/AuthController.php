<?php
// src/controllers/AuthController.php

namespace Controllers;

use Models\User;
use Controllers\ResultController;

class AuthController extends ResultController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->email = $_POST['email'];
            $user->password = $_POST['password']; // On garde le mot de passe en clair pour la vérification

            $loggedInUser = $user->login();
            if ($loggedInUser) {
                session_start();
                $_SESSION['user_id'] = $loggedInUser['id'];
                $_SESSION['username'] = $loggedInUser['nickname']; // Utiliser le pseudo comme nom d'utilisateur
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
            $user->firstname = $_POST['firstname'];
            $user->lastname = $_POST['lastname'];
            $user->nickname = $_POST['nickname'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password']; // On garde le mot de passe en clair pour le hachage

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
